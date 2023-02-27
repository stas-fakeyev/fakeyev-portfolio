		        <nav id="mainmenu" class="mainmenu">
					<ul>
					<li><a href="{{ route('posts.index') }}">{{ __('posts/pages.section_title') }}</a></li>
					@if ($menu)
@include('components.menu-items', ['items' => $menu->roots()])
							@endif
</ul>
</nav>
