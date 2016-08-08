@extends('layout.back')

@section('content')
    <section class="Pay">

        <h1 class="col-12 small-12  bottom-element">
            Bienvenido <span class="user">{{Auth::user()->name . ' ' . Auth::user()['last-name']}}</span> al Directorio
            de Industrias Creativas y Culturales
        </h1>
        @if(auth()->user()->role_id == 2)
            @if(!auth()->user()->client->validate)
                <p>Estás a un solo paso para pertenecer al directorio de industrias creativas y culturales, si ya
                    realizaste el pago estamos
                    verificando.
                </p>
                <form action="http://servicios.corferias.com/inscripcion">
                    <input type="hidden" name="ano" value="2016">
                    <input type="hidden" name="evento" value="W070">
                    <input type="hidden" name="congreso" value="1">
                    <button>PAGAR $ 240.000 COP</button>
                </form>
                <form action="http://servicios.corferias.com/inscripcion/">
                    <input type="hidden" name="ano" value="2016">
                    <input type="hidden" name="evento" value="W069">
                    <input type="hidden" name="congreso" value="1">
                    <button>PAGAR $ 80 USD</button>
                </form>
            @else
                <p> ¡ Tu pago ha sido registrado, en breve nos estaremos comunicando ! </p>
            @endif
        @endif
    </section>
@endsection