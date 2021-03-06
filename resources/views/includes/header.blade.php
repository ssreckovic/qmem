<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a href="{{ route('dashboard') }}" class="navbar-brand mb-0 h1">QMEM</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternal" aria-controls="navbarToggleExternal" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarToggleExternal">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item {{ Route::currentRouteNamed('assets.index') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('assets.index') }}">Assets</a>
			</li>
			<li class="nav-item {{ Route::currentRouteNamed('consumables.index') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('consumables.index') }}">Consumables</a>
			</li>
			<li class="nav-item {{ Route::currentRouteNamed('categories.index') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Tools
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('reports.index') }}">Reports</a>
					<a class="dropdown-item" href="{{ route('barcodes.index') }}">Generate Barcodes</a>
					<a class="dropdown-item" href="{{ route('export.index') }}">Export Data</a>
				</div>
			</li>
		</ul>
		{{ Form::open(array('method' => 'get', 'route' => array('search.index'), 'class' => 'form-inline', 'id' => 'search')) }}
		<div class="search input-group">
			<input type="text" name="query" id="search-input" class="my-2 my-md-0 form-control" placeholder="Search" {{ Route::currentRouteNamed('search.index') ? '' : 'autofocus="autofocus"' }}>
			<div class="input-group-append">
				<button type="submit" class="btn btn-outline-secondary my-2 my-md-0 form-control" >
					<i class="fa fa-search"></i>
				</button>
			</div>
		</div>
		{{ Form::close() }}
		@if (Auth::check())
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ Auth::user()->name }}
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
						@if (Auth::user()->group->name == 'admin')
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header text-danger">Administration</h6>
						<a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
						@endif
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
					</div>
				</li>
			</ul>
		@endif
	</div>
</nav>