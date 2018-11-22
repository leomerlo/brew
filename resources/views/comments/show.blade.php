@include('comments.list',compact($comments))

@guest
	<div class="card">
		<div class="card-body">Tenés que loguearte para dejar comentarios. <a href="{{ route('login') }}">Login</a></div>
	</div>
@else
	@include('comments.form',compact($id))
@endguest