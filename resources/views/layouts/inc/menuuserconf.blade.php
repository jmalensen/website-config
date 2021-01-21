<div class="content-side content-side-full">
	<ul class="nav-main">
		<li class="nav-main-item">
			<a class="nav-main-link{{ request()->routeIs('userconf.home') ? ' active' : '' }}" href="{{route('userconf.home')}}">
				<i class="nav-main-link-icon si si-cursor"></i>
				<span class="nav-main-link-name">@lang('commun.home')</span>
			</a>
		</li>
	</ul>
</div>
