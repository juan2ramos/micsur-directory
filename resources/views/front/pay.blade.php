@extends('layout.back')

@section('content')
   <section class="Pay">

       <h1 class="col-12 small-12  bottom-element">
           Bienvenido <span class="user">{{Auth::user()->name . ' ' . Auth::user()['last-name']}}</span> al Directorio de Industrias Creativas y Culturales
       </h1>
       <p>Estás a  un solo paso para pertenecer al directorio de industrias creativas y culturales</p>
       <form action="http://servicios.corferias.com/inscripcion">
           <input type="hidden" name="ano" value="2016">
           <input type="hidden" name="evento" value="W070">
           <input type="hidden" name="congreso" value="1">
           <button>PAGAR $ 240000 COP</button>
       </form>
       <form action="http://servicios.corferias.com/inscripcion/">
           <input type="hidden" name="ano" value="2016">
           <input type="hidden" name="evento" value="W069">
           <input type="hidden" name="congreso" value="1">
           <button>PAGAR $ 80 USD</button>
       </form>
   </section>
@endsection