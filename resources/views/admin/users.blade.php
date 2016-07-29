@extends('layout.back')

@section('content')
    <h2 class="Admin-h2">Bienvenido <b>{{auth()->user()->name . ' ' . auth()->user()['last-name']}}</b></h2>

    <form class="row end Search" action="{{route('UserSearch')}}" method="post">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input name="search" type="text" placeholder="Buscar por email o nombre">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125"><path d="M43.075 14.5c-7.188 0-14.375 2.74-19.872 8.192-10.937 10.932-10.937 28.658 0 39.59 10.57 10.514 27.48 10.877 38.502 1.09l21.93 21.894c.31.308.845.308 1.127.028.31-.28.31-.84.028-1.118L62.833 62.283c.028-.028.028-.028.057-.028 10.937-10.932 10.965-28.63.028-39.563-5.47-5.452-12.656-8.192-19.843-8.192zm0 1.566c6.765 0 13.557 2.572 18.715 7.745 10.345 10.318 10.345 27.01 0 37.327-10.344 10.317-27.086 10.317-37.43 0-10.346-10.317-10.346-27.01 0-37.326 5.157-5.172 11.95-7.744 18.715-7.744z"/></svg>
        </button>
    </form>
    <table class="Admin-table" id="tableUsers" data-route="{{route('payClient')}}">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Mail</th>
            <th>Estado</th>
            <th>Ver/Editar</th>
            <th>Actualizar pago</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr id="user-{{$client->id}}">
                <td>{{$client->id}}</td>
                <td>{{$client->user->name . ' ' . $client->user['last-name']}}</td>
                <td>{{$client->user->email}}</td>
                <td class="pay">{{($client->validate)?'Pagado':'Sin pagar'}}</td>
                <td><a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 90">
                            <g fill="#e4bf08" fill-rule="evenodd">
                                <path d="M70.364 26.497L83.3 39.434 43.49 79.248 30.55 66.31l39.814-39.813zm-42.6 43.087L40.7 82.52l-14.94 2.003 2.003-14.94zm51.972-52.432c.98-.98 2.436-1.102 3.572.034l9.42 9.42c1.123 1.123.957 2.47-.054 3.483-1.012 1.01-6.846 6.845-6.846 6.845L72.89 23.998l6.846-6.846zM65.668 23.13c-6.52-4.278-15.046-8.278-25.004-8.47h-.088c-14.204.274-25.512 8.3-32.22 13.824-.32.263-2.518 1.968-2.555 4.147-.026 1.535.682 2.67 1.7 3.618 5.14 5.03 15.977 13.728 30.2 14.85l27.968-27.97zM54.45 34.346c.045-.464.068-.935.068-1.41 0-7.787-6.193-14.105-13.898-14.154-7.686.05-13.9 6.367-13.9 14.153 0 7.786 6.214 14.103 13.9 14.155.384-.002.764-.02 1.14-.053l12.69-12.69zm-13.786-6.913c-.015-.002-.03-.002-.044-.002h-.044v.002c-2.94.074-5.306 2.51-5.306 5.502s2.363 5.43 5.306 5.5v.006c.015 0 .03-.005.044-.005.012 0 .027.005.044.005v-.005c2.963-.07 5.306-2.51 5.306-5.5 0-2.994-2.343-5.43-5.306-5.503z"/>
                            </g>
                        </svg>
                    </a>
                </td>
                <td class="payUpdate">
                    @if(!$client->validate)
                        <a href="#" data-user="{{$client->id}}" class="Admin-payUpdate">Actualizar</a>
                        <svg  class="loader"  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" >
  <path fill="#e4bf08"
        d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
      <animateTransform attributeType="xml"
                        attributeName="transform"
                        type="rotate"
                        from="0 25 25"
                        to="360 25 25"
                        dur="0.6s"
                        repeatCount="indefinite"/>
  </path>
  </svg>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $clients->render() !!}
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

@endsection
@section('scripts')
    <script src="{{asset('js/formUsers.js')}}"></script>
@endsection