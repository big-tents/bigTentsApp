@extends('templates.v1')

@section('content')
<h2>{{ $title }}</h2>
<hr>

@include('common.message')

<!-- If there's error, show errors -->
@include('common.errors')

<!-- Joined Events -->
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Event(s) You have joined:</h3>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			@foreach($joined_events as $je)
				<tr>
					<td><a href="event/{{ $je->event->first()->id }}">{{ e($je->event->first()->e_name) }}</a></td>
				</tr>
			@endforeach
		</table>
	</div>
</div>

<hr>

<!-- Hosted Events -->
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Event(s) You have hosted:</h3>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			@foreach($hosted_events as $he)
				<tr>
					<td>
					<a href="event/{{ $he->id }}">
					{{ $he->e_name }}
					</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>

@stop