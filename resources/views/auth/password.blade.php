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

    <form class="row center middle FormAuth Forms Login" role="form" method="POST" action="/password/email"">
        <div class="BackContainer FormAuth-container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2>RESTAURAR PASSWORD</h2>

            <label for="email">
                <input type="email" name="email" value="{{ old('email') }}">
                <span>E-mail</span>
            </label>


            <button  type="submit" class="Button submit"> RESTAURAR</button>
        </div>
    </form>


@endsection
@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
@endsection
