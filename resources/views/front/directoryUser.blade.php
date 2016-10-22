@extends('layout.back')

@section('content')
    <section class="Directory Directory-user">
        <div class="row between middle">
            <h1>DIRECTORIO</h1>
            <a class="Directory-MeProfile" href="{{route('profile')}}">{{Auth::user()->name}}</a>
        </div>
        <div>
            <article class="row">

                <figure class="col-4 small-12">
                    @if( !empty($user->user['image-profile']))
                        <img src="{{asset('uploads/profiles/' . $user->user['image-profile'])}}" alt="">
                    @else
                        <img src="{{asset('images/micsur.png')}}" alt="">
                    @endif


                </figure>

                <div class="Directory-userInfo col-8 small-12">
                    <section class="row">
                        <article class="col-6 small-12">
                            <h3>{{$user->user->name . ' ' . $user->user['last-name'] }} </h3>
                            <p><span>Pais</span>{{$user->countryName->name}}</p>
                            <p><span>Compañia</span>{{$user->company}}</p>
                            <p><span>Dirección</span>{{$user->address}}</p>
                            <p><span>Sitio web</span><a href="{{$user->website}}" target="_blank">{{$user->website}}</a>
                            </p>

                            <p><span>Email</span><a href="mailto:{{$user->user->email}}">{{$user->user->email}}</a></p>
                        </article>
                        <article class="col-6 small-12">
                            @if(Auth::user()->role_id == 1)
                                @include('formMessage')
                            @endif
                        </article>
                    </section>
                    <div class="row">
                        @foreach($user->sectors as $sector)
                            <span>{{$sector->name}}</span>
                        @endforeach
                    </div>
                    <p class="col-12 small-12 Directory-activity">{{$user->activities}}</p>
                </div>

            </article>


        </div>
    </section>

@endsection
@section('scripts')
    <script src="{{asset('js/sendmail.js')}}"></script>
    <script src="{{asset('js/flatpickr.js')}}"></script>
    <script>
        $(".calendar").flatpickr();
    </script>
@endsection
@section('styles')
    <link href="https://chmln.github.io/flatpickr/dist/flatpickr.min.css" rel="stylesheet"/>
@endsection