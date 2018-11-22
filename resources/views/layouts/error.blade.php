@include('layouts.head')

<div class="container-fluid">
  <div class="row d-flex">
    <main class="container col">

        <div class="p-5">

          <h1 class="main">La página que estas buscando no existe.</h1>

          <a href="{{ URL::previous() }}">Volver</a>

        </div>
    </main>
  </div>
</div>

@include('layouts.foot')