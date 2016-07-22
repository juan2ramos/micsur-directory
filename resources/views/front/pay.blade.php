@extends('layout.back')

@section('content')
   <section class="Pay">

       <h1 class="col-12 small-12  bottom-element">
           Bienvenido <span class="user">{{Auth::user()->name . ' ' . Auth::user()['last-name']}}</span> al Directorio de Industrias Creativas y Culturales
       </h1>
       <p>Estás a  un solo paso para pertenecer al directorio de industrias creativas y culturales</p>
       <form action="">
           <button>PAGAR</button>
       </form>
   </section>
@endsection