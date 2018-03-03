@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Delete: {{ !empty($consumable->name) ? $consumable->name : '#' . $consumable->id }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ $consumable }}
				</div>
			</div>
		</div>
	</div>
@stop