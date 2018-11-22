@section('body-class','login')

@include('layouts.head')

<div class="container">

    <div class="mb-5 logo">
        <img src="{{ url("imgs/logo.svg") }}" alt="BREW" />
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                        </label>
                    </div>
                </div>

                <div class="option-container">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Ingresar
                        </button>
                    </div>
                    <a class="link link-register" href="{{ route('password.request') }}">Olvidaste tu clave?</a> | 
                    <a class="link link-register" href="{{ route('register') }}">Registrate</a>

                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.foot')
