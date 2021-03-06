@extends('layout.back')

@section('content')
    <h2 class="Admin-h2">Bienvenido <b>{{auth()->user()->name . ' ' . auth()->user()['last-name']}}</b></h2>

    <form class="row between middle Search" action="{{route('UserSearch')}}" method="post">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="row end">
            <a style="width: 80px" href="{{route('usersExcel')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                    <style>.st0 {
                            display: none;
                            opacity: 0.24;
                        }

                        .st1 {
                            display: inline;
                        }

                        .st2 {
                            fill: #231F20;
                        }

                        .st3 {
                            display: none;
                            opacity: 0.5;
                        }

                        .st4 {
                            display: inline;
                            fill: #231F20;
                        }</style>
                    <g class="st0 st1">
                        <path class="st2"
                              d="M63.5 6.5h-47v86.9H85V28.1L63.5 6.5zm.6 4.2l16.6 16.7H64.1V10.7zM61.7 9v20.8h20.8v41H19V9h42.7zM19 90.9V72.5h63.5v18.4H19z"/>
                    </g>
                    <g class="st3 st1">
                        <path class="st2"
                              d="M42.1 58.9c-2.1 0-3.7-1.7-3.7-3.7 0-2.1 1.7-3.7 3.7-3.7s3.7 1.7 3.7 3.7-1.7 3.7-3.7 3.7zm0-5.9c-1.2 0-2.1 1-2.1 2.1s.9 2.1 2.1 2.1c1.1 0 2.1-.9 2.1-2.1-.1-1.1-1-2.1-2.1-2.1zM54.9 55.3c-2.1 0-3.7-1.7-3.7-3.7 0-2.1 1.7-3.7 3.7-3.7 2.1 0 3.7 1.7 3.7 3.7s-1.6 3.7-3.7 3.7zm0-5.9c-1.1 0-2.1.9-2.1 2.1 0 1.1.9 2.1 2.1 2.1 1.1 0 2.1-.9 2.1-2.1 0-1.1-1-2.1-2.1-2.1z"/>
                        <path class="st2"
                              d="M45.8 55.4h-1.7V39.9l14.4-4.3v15.1h-1.7V37.8l-11 3.4M46.6 82.5c-.1-1.2-.1-2.7-.1-4-.3 1.2-.7 2.5-1.1 3.7L44 86.4h-1.4l-1.3-4.1c-.4-1.2-.7-2.5-1-3.7 0 1.3-.1 2.8-.2 4.1l-.2 3.9h-1.6l.6-9.6h2.3l1.3 3.9c.3 1.1.6 2.3.9 3.3.3-1 .6-2.2 1-3.4l1.3-3.9H48l.6 9.6h-1.7l-.3-4zM50.3 76.9c.6-.1 1.5-.2 2.7-.2 1.3 0 2.2.3 2.8.8.6.5.9 1.2.9 2.1 0 .9-.3 1.7-.8 2.2-.7.7-1.8 1-3 1-.3 0-.6 0-.9-.1v3.6h-1.7v-9.4zm1.7 4.5c.2.1.5.1.9.1 1.3 0 2.1-.6 2.1-1.8 0-1.1-.7-1.6-2-1.6-.5 0-.8 0-1 .1v3.2zM58.2 84.6c.4.2 1.2.6 2.1.6 1.3 0 1.9-.8 1.9-1.5 0-1.1-1-1.6-2.1-1.6h-.8v-1.3h.8c.8 0 1.8-.4 1.8-1.3 0-.6-.5-1.2-1.5-1.2-.8 0-1.5.3-1.9.6l-.4-1.3c.5-.4 1.6-.7 2.7-.7 1.9 0 2.9 1.1 2.9 2.3 0 1-.6 1.8-1.7 2.2 1.1.2 2 1.1 2 2.3 0 1.6-1.3 2.8-3.6 2.8-1.1 0-2.1-.3-2.6-.6l.4-1.3z"/>
                        <path class="st2"
                              d="M63.9 6.5h-47v86.9h68.5V28.1L63.9 6.5zm.7 4.2l16.6 16.7H64.6V10.7zM62.1 9v20.8h20.8v41H19.4V9h42.7zM19.4 90.9V72.5h63.5v18.4H19.4z"/>
                    </g>
                    <g class="st3">
                        <path class="st1 st2" d="M65.9 60.3H36.4V36.4h29.5v23.9zm-27.8-1.7h26.1V38.1H38.1v20.5z"/>
                        <path class="st1 st2"
                              d="M59.1 46.1c-1.8 0-3.2-1.4-3.2-3.2 0-1.8 1.4-3.2 3.2-3.2 1.8 0 3.2 1.4 3.2 3.2 0 1.8-1.4 3.2-3.2 3.2zm0-4.7c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5 1.5-.7 1.5-1.5-.7-1.5-1.5-1.5zM64.3 59.8c-2.9-6.1-5.6-9.3-8.1-9.6-2.1-.3-3.9 1.7-5.5 3.5l-1 1.2-.5-1.4c-1.8-5.4-3.8-8.5-5.7-8.5-2.5 0-4.9 4.5-5.6 6.2l-1.5-.6c.3-.7 3-7.3 7.1-7.3h.1c2.6.1 4.8 2.8 6.8 8.3 1.4-1.5 3.4-3.3 6-3 3.1.4 6.2 3.8 9.4 10.5l-1.5.7z"/>
                        <g class="st1">
                            <path class="st2"
                                  d="M42.7 76.7h1.8v6.2c0 2.7-1.3 3.5-3.2 3.5-.5 0-1.1-.1-1.5-.2l.2-1.4c.3.1.7.2 1.1.2 1 0 1.6-.5 1.6-2.1v-6.2zM46.4 76.8c.6-.1 1.5-.2 2.7-.2 1.3 0 2.2.3 2.8.8.6.5.9 1.2.9 2.1 0 .9-.3 1.7-.8 2.2-.7.7-1.8 1-3 1-.3 0-.6 0-.9-.1v3.6h-1.7v-9.4zm1.7 4.5c.2.1.5.1.9.1 1.3 0 2.1-.6 2.1-1.8 0-1.1-.7-1.6-2-1.6-.5 0-.8 0-1 .1v3.2zM62.1 85.9c-.6.2-1.8.5-3.1.5-1.6 0-2.9-.4-3.8-1.3-.9-.8-1.4-2.1-1.3-3.5 0-3 2.2-5 5.3-5 1.2 0 2.1.2 2.6.5l-.4 1.4c-.5-.2-1.2-.4-2.2-.4-2.1 0-3.5 1.2-3.5 3.5 0 2.2 1.3 3.5 3.3 3.5.6 0 1.1-.1 1.3-.2v-2.4h-1.7V81H62v4.9z"/>
                        </g>
                        <path class="st4"
                              d="M63.9 6.5h-47v86.9h68.5V28.1L63.9 6.5zm.7 4.2l16.6 16.7H64.6V10.7zM62.1 9v20.8h20.8v41H19.4V9h42.7zM19.4 90.9V72.5h63.5v18.4H19.4z"/>
                    </g>
                    <g class="st3">
                        <path d="M39.6 37.4l2.4 9.3c.5 2 1 3.9 1.4 5.8h.1c.4-1.9 1-3.8 1.6-5.8l3-9.3h2.8l2.8 9.1c.7 2.2 1.2 4.1 1.6 6h.1c.3-1.9.8-3.8 1.4-5.9l2.6-9.2h3.3l-5.9 18.3h-3L51.1 47c-.6-2-1.2-3.9-1.6-6h-.1c-.5 2.2-1 4.1-1.7 6l-2.9 8.7h-3l-5.5-18.3h3.3z"
                              class="st1"/>
                        <g class="st1">
                            <path class="st2"
                                  d="M37.4 77.3c.8-.1 1.8-.2 2.8-.2 1.8 0 3 .4 3.9 1.1.9.8 1.5 1.9 1.5 3.5 0 1.7-.6 3-1.5 3.8-1 .9-2.5 1.3-4.3 1.3-1 0-1.8-.1-2.4-.1v-9.4zm1.8 8.1h1c2.3 0 3.6-1.2 3.6-3.7 0-2.1-1.2-3.3-3.4-3.3-.6 0-1 0-1.2.1v6.9zM55.7 81.8c0 3.2-2 5.1-4.6 5.1-2.7 0-4.4-2.1-4.4-4.9 0-2.9 1.9-5 4.6-5 2.7 0 4.4 2.1 4.4 4.8zm-7.2.2c0 2 1 3.5 2.7 3.5 1.7 0 2.6-1.6 2.6-3.6 0-1.8-.9-3.5-2.6-3.5-1.7 0-2.7 1.6-2.7 3.6zM64.1 86.4c-.4.2-1.3.4-2.5.4-3 0-4.9-1.9-4.9-4.8 0-3.2 2.2-5.1 5.1-5.1 1.2 0 2 .2 2.3.4l-.4 1.4c-.5-.2-1.1-.4-1.9-.4-2 0-3.4 1.2-3.4 3.5 0 2.1 1.2 3.5 3.3 3.5.7 0 1.5-.1 1.9-.4l.5 1.5z"/>
                        </g>
                        <path class="st4"
                              d="M63.8 6.5H16.9v86.7h68.4V28L63.8 6.5zm.7 4.1L81 27.3H64.5V10.6zM62 9v20.8h20.8v40.9H19.4V9H62zM19.4 90.7V72.4h63.4v18.4H19.4z"/>
                    </g>
                    <path d="M46 37.4l2.6 4c.7 1 1.3 2 1.9 3h.1c.6-1.1 1.2-2.1 1.8-3l2.6-3.9h3.6l-6.3 8.9 6.5 9.5H55l-2.7-4.2c-.7-1.1-1.3-2.1-2-3.2h-.1c-.6 1.1-1.3 2.1-1.9 3.2l-2.7 4.2H42l6.6-9.4-6.2-9H46z"/>
                    <path class="st2"
                          d="M45.9 86.7l-1-1.9c-.4-.7-.7-1.3-1-1.8-.2.6-.5 1.1-.9 1.8l-1 1.9h-2l2.8-4.9-2.7-4.7h2l1 2c.3.6.5 1.1.8 1.6l.8-1.6 1-2h2L45 81.8l2.9 4.9h-2zM49.2 77.1H51v8.1h3.9v1.5h-5.7v-9.6zM56.2 84.8c.6.3 1.4.6 2.3.6 1.1 0 1.8-.5 1.8-1.3 0-.7-.5-1.2-1.7-1.6C57 82 56 81.1 56 79.7c0-1.6 1.3-2.8 3.4-2.8 1 0 1.8.2 2.3.5l-.4 1.4c-.3-.2-1-.5-1.9-.5-1.1 0-1.6.6-1.6 1.2 0 .7.6 1.1 1.8 1.6 1.7.6 2.5 1.5 2.5 2.8 0 1.5-1.2 2.9-3.6 2.9-1 0-2.1-.3-2.6-.6l.3-1.4z"/>
                    <path class="st2"
                          d="M63.8 6.5H16.9v86.7h68.4V28L63.8 6.5zm.6 4.1L81 27.3H64.4V10.6zM61.9 9v20.8h20.8v40.9H19.3V9h42.6zM19.3 90.7V72.4h63.4v18.4H19.3z"/>
                </svg>
            </a>
        </div>
        <div class="row" style="position: relative">
            <input name="search" type="text" placeholder="Buscar por email o nombre">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100">
                    <path d="M43.075 14.5c-7.188 0-14.375 2.74-19.872 8.192-10.937 10.932-10.937 28.658 0 39.59 10.57 10.514 27.48 10.877 38.502 1.09l21.93 21.894c.31.308.845.308 1.127.028.31-.28.31-.84.028-1.118L62.833 62.283c.028-.028.028-.028.057-.028 10.937-10.932 10.965-28.63.028-39.563-5.47-5.452-12.656-8.192-19.843-8.192zm0 1.566c6.765 0 13.557 2.572 18.715 7.745 10.345 10.318 10.345 27.01 0 37.327-10.344 10.317-27.086 10.317-37.43 0-10.346-10.317-10.346-27.01 0-37.326 5.157-5.172 11.95-7.744 18.715-7.744z"/>
                </svg>
            </button>
        </div>
    </form>

    <table class="Admin-table" id="tableUsers" data-route="{{route('updatePayClient')}}">
        <thead>
        <tr>

            <th>Nombre</th>
            <th>Mail</th>
            <th>Estado</th>
            <th>Ver/Editar</th>
            <th>Actualizar pago</th>
            <th>Fecha inscripción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr id="user-{{$client->id}}">
                <td>{{$client->user->name . ' ' . $client->user['last-name']}}</td>
                <td>{{$client->user->email}}</td>
                <td class="pay">{{($client->validate)?'Pagado':'Sin pagar'}}</td>
                <td><a href="{{route('clientDetail',['id' => $client->id])}}">
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
                        <svg class="loader" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
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
                <td>{{$client->created_at}}</td>
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