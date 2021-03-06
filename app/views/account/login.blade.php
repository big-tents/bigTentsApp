@extends('templates.v2')

@section('content')
<section id="page-login">
<script>
$().ready(function(){
    getNearbyEvents();
});

</script>
	<!--Events Near -->
    <article id="events_near">
        <h1><span id="x_events_founded">Loading...</span> events</h1><br/>
        <h2>near your location</h2>
    </article><!-- /Events Near -->
	@if(Auth::check())
		<script>window.location.replace(BASE_URL + "/events");</script>
	@else
	<h2>Login</h2>

	<!-- If there's error, show errors -->
	@include('common.errors')

	<!-- Login Field -->
	{{ Form::open(['url'=>URL::route('account-login-post'), 'method'=>'POST']) }}
	
	{{ Form::token() }}
	<table class="table" style="width:500px;">
		<tr>
			<td>{{ Form::label('email', 'Email: ') }}</td>
			<td>{{ Form::email('email', Input::old('email'), ['class'=>'bs-input bs-max']) }}</td>
		</tr>
		<tr>
			<td>{{ Form::label('password', 'Password: ') }}</td>
			<td>{{ Form::password('password', ['class'=>'bs-input bs-max']) }}</td>
		</tr>
		<tr>
			<td>{{ Form::label('remember', 'Remember me: ') }}</td>
			<td>{{ Form::checkbox('remember', 'remember', false) }}</td>
		</tr>
		<tr>
			<td></td>
			<td>{{ Form::submit('Log in', ['class'=>'bs-input bs-max']) }}</td>
		</tr>
		<tr>
			<td align="right" colspan="2"><a href="{{ URL::route('account-forgot-password') }}" class="btn btn-warning">Forgot Password?</a></td>
		</tr>
	</table>
	{{ Form::close()}}
@endif

</section>
@stop