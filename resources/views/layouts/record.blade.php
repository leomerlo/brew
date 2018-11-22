@include('layouts.head')

<div class="container-fluid">
  <div class="row d-flex">
    <main class="container col">

        <div class="p-5">

          <h1 class="main">@yield('main.title')</h1>

          @yield('main')

        </div>
    </main>
  </div>
</div>

@include('layouts.foot')