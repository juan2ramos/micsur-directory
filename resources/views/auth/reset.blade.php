@extends('layout')

@section('content')
    <header class="HeaderAuth">
        <div class="HeaderAuth-content row middle ">
            <figure class="col-8 ">
                <a href="/"><img src="{{ url('images/logo-agrosellers.svg') }}" alt=""></a>
            </figure>
            <a class="col-2 end" href="{{route('login')}}">
                <button class="Button">INICIAR SESIÓN</button>
            </a>
            <a class="col-2 end" href="{{route('register')}}">
                <button class="Button">REGISTRATE</button>
            </a>
        </div>
    </header>
    @if (count($errors) > 0)
        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row center middle FormAuth Forms Login" role="form" method="POST" action="/password/reset">
        <div class="BackContainer FormAuth-container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <h2>TU NUEVA CONTRASEÑA</h2>

            <label for="email">
                <input type="email" name="email" value="{{ old('email') }}">
                <span>E-mail</span>
            </label>
            <label for="password">
                <input type="password" name="password" id="password">
                <span>Contraseña</span>
            </label>
            <label for="password_confirmation">
                <input type="password" id="password_confirmation" name="password_confirmation">
                <span>Confirmar Contraseña</span>
            </label>


            <button type="submit" class="Button submit"> RESTAURAR</button>
        </div>
    </form>


@endsection

@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
    <script src="{{asset('js/password.js')}}"></script>
@endsection



