@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Delete: {{ !empty($asset->name) ? $asset->name : '#' . $asset->id }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Asset Information</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>ID</strong></td>
								<td style="width: 75%">{{ $asset->id }}</td>
							</tr>
							<tr>
								<td><strong>Name</strong></td>
								<td>{{ $asset->name }}</td>
							</tr>
							<tr>
								<td><strong>Category</strong></td>
								<td><a href="{{ route('categories.view', $asset->category_id) }}">{{ $asset->category->name }}</a></td>
							</tr>
							<tr>
								<td><strong>Created At</strong></td>
								<td>{{ $asset->created_at }}</td>
							</tr>
							<tr>
								<td><strong>Updated At</strong></td>
								<td>{{ $asset->updated_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('assets.destroy', $asset->id))) }}
						{{ Form::hidden('next', url()->previous()) }}
						
						<div class="form-group row">
							<div class="col-md-12">
								<h4>Are you sure you want to delete this asset?</h4>
								<h6>This action is permanent and cannot be undone.</h6>
							</div>
						</div>

						<hr>

						<div class="form-group row">
							<div class="col-md-12">
								{{ Form::submit('Destroy', ['class' => 'btn btn-danger']) }}
								<a class="btn btn-secondary" href="{{ url()->previous() }}">Cancel</a>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop