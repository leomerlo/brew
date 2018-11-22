@include('layouts.head')

<div class="container-fluid">
  <div class="row d-flex">

    <aside class="col">
      <ul class="nav flex-column">
        <li class="nav-item logo">
          <img src="{{ url("imgs/logo.svg") }}" alt="BREW" />
        </li>
        @foreach($adminMenu as $item)
        <li class="nav-item {{ Request::segment(2) === $item->slug ? 'active' : null }}">
          <a class="nav-link title" href="{{ route('record.index', ['slug' => $item->slug]) }}">{{$item->type}}</a>
        </li>
        @endforeach
        <li class="nav-item dropdown {{ Request::segment(2) === 'user' || Request::segment(2) === 'recordType' || Request::segment(2) === 'fields' ? 'active' : null }}">

          <a class="nav-link {{ Request::segment(2) === 'user' || Request::segment(2) === 'recordType' || Request::segment(2) === 'fields' ? null : 'collapsed' }} title" data-toggle="collapse" href="#configMenu" id="configMenuDropdown" role="button" aria-expanded="false" aria-controls="configMenu">
            Configuracion
          </a>
          <div id="configMenu" class="{{ Request::segment(2) === 'users' || Request::segment(2) === 'recordType' || Request::segment(2) === 'fields' ? 'collapse show' : 'collapse' }}" aria-labelledby="configMenuDropdown" data-parent="#configMenuDropdown">
            <ul class="nav flex-column">
              <li class="nav-item {{ Request::segment(2) === 'user' ? 'active' : null }}"><a class="nav-link title" href="<?= route("user.index"); ?>">Users</a></li>
              <li class="nav-item {{ Request::segment(2) === 'recordType' ? 'active' : null }}"><a class="nav-link title" href="<?= route("recordType.index");?>">Tipos de record</a></li>
              <li class="nav-item {{ Request::segment(2) === 'fields' ? 'active' : null }}"><a class="nav-link title" href="<?= route("fields.index");?>">Tipos de campos</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item dropdown">
            <a id="userMenuDropdown" class="nav-link title collapsed" data-toggle="collapse" href="#userMenu" role="button" aria-expanded="false" aria-controls="userMenu">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div id="userMenu" class="collapse" aria-labelledby="userMenuDropdown" data-parent="#userMenuDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

      </ul>
    </aside>

    <main class="container col">

        @if(Session::has('message'))
            <div class="alert alert-success">
                {!! Session::get('message') !!}
            </div>
        @endif

        <div class="p-5">

          <h1 class="main">@yield('main.title')</h1>

          @yield('main')

        </div>
    </main>
  </div>
</div>

@include('layouts.foot')