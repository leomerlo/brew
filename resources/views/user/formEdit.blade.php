@extends('layouts.main')

@section('title', 'Editando Usuario '.$user->name)

@section('main.title', 'Editando Usuario '.$user->name)

@section('scripts')
<script src="<?= url('js/forms.js') ?>"></script>
@endsection

@section('main')

	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="{{ route('user.editStore', ['id' => $user->id]) }}">
				
				@csrf
				@method('PUT')

				<div class="form-group">
            <label for="name">Nombre</label>

            <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" required autofocus>

            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}" required>

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirmar Password</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        </div>

        <div class="form-group">
            <label for="password-confirm">Nivel de usuario</label>

            {{ Form::select('auth_level', ['0' => 'Administrador', '1' => 'Usuario'], old('auth_level',$user->auth_level), ['class' => 'form-control'] ) }}
        </div>

        <div class="option-container">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Editar
                </button>
            </div>
        </div>

			</form>
		</div>
	</div>

@endsection