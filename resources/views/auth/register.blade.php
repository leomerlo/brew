@section('body-class','login register')

@include('layouts.head')

<div class="container">

    <div class="mb-5 logo">
        <img src="{{ url("imgs/logo.svg") }}" alt="BREW" />
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre</label>

                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirmar Password</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="option-container">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Registrarse
                        </button>
                    </div>
                    <a class="link link-register" href="{{ route('login') }}">
                        Ya tenés cuenta? Ingresá
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.foot')
