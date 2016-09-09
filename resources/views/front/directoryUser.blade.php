@extends('layout.back')

@section('content')
    <section class="Directory Directory-user">
        <div class="row between middle">
            <h1>DIRECTORIO</h1>
            <a class="Directory-MeProfile" href="{{route('profile')}}">{{Auth::user()->name}}</a>
        </div>
        <form action="" class="row middle center Directory-form">
            <label class="col-4" for="">
                <input class="col-10" type="text" name="name" placeholder="Nombre">
            </label>
            <label class="col-4" for="">
                <input class="col-10" type="text" name="country" placeholder="País">
            </label>
            <label class="col-4" for="">
                <input class="col-10" type="text" name="sector" placeholder="Sector">
            </label>
            <div class="col-12 row end">
                <button>BUSCAR</button>
            </div>
        </form>
        <div>
            <article class="row">

                <figure class="col-4">
                    <img src="{{asset('uploads/profiles/' . $user->user['image-profile'])}}" alt="">
                </figure>

                <div class="Directory-userInfo col-8">
                    <h3>{{$user->user->name}}</h3>
                    <p><span>Pais</span>{{$user->countryName->name}}</p>
                    <p><span>Compañia</span>{{$user->company}}</p>
                    <p><span>Dirección</span>{{$user->address}}</p>
                    <p><span>Sitio web</span><a href="{{$user->website}}" target="_blank">{{$user->website}}</a></p>
                    <p><span>Email</span><a href="mailto:{{$user->user->email}}">{{$user->user->email}}</a></p>

                    <div class="row">
                        @foreach($user->sectors as $sector)
                            <span>{{$sector->name}}</span>
                        @endforeach
                    </div>
                    <p class="col-12 Directory-activity">{{$user->activities}}</p>
                </div>

            </article>


        </div>
    </section>

@endsection