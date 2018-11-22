<div class="front-menu">
	<div class="container">
		<ul>
		@foreach($frontMenu as $item)
			<li>
				<a href="{{ route('record.view',['slug' => $item['slug']]) }}">{{ isset($item['title']) ? $item['title'] : $item['type'] }}</a>
			</li>
		@endforeach
		@if(Auth::guard()->check())
			<li class="logout">
				<a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
			</li>
		@endif
		</ul>
	</div>
</div>