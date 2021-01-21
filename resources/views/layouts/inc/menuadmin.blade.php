<div class="content-side content-side-full">
	<ul class="nav-main">
		<li class="nav-main-item">
			<a class="nav-main-link{{ request()->routeIs('admin.home') ? ' active' : '' }}" href="{{route('admin.home')}}">
				<i class="nav-main-link-icon si si-cursor"></i>
				<span class="nav-main-link-name">@lang('commun.home')</span>
			</a>
		</li>

		@can('manageuser')
			<li class="nav-main-item">
				<a class="nav-main-link{{ request()->routeIs('companies.index') ? ' active' : '' }}"
				   href="{{route('companies.index')}}">
					<i class="nav-main-link-icon fa fa-building"></i>
					<span class="nav-main-link-name">@lang('companies.companies')</span>
				</a>
			</li>

			<li class="nav-main-item{{ request()->routeIs('users.index') || request()->routeIs('users.edit') || request()->routeIs('users.create') ? ' open' : '' }}">
				<a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
				   aria-expanded="true" href="#">
					<i class="nav-main-link-icon fa fa-cogs"></i>
					<span class="nav-main-link-name">@lang('commun.config')</span>
				</a>
				<ul class="nav-main-submenu">
					<li class="nav-main-item">
						<a class="nav-main-link{{ request()->routeIs('users.index') ? ' active' : '' }}"
						   href="{{route('users.index')}}">
							<span class="nav-main-link-name">@lang('users.index')</span>
						</a>
					</li>
				</ul>
			</li>
		@endcan
	</ul>
</div>
