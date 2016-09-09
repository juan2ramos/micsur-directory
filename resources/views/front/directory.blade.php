@extends('layout.back')

@section('content')
    <section class="Directory">
        <div class="row between middle">
            <h1>DIRECTORIO</h1>
            <a class="Directory-MeProfile" href="{{route('profile')}}" >{{Auth::user()->name}}</a>
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
        <ul class="row">
            @foreach($users as $user)
                <li class="col-6 small-12">
                    <article class="row">

                        <figure class="col-4">
                            <img src="{{asset('uploads/profiles/' . $user->user['image-profile'])}}" alt="">
                        </figure>

                        <div class="Directory-userInfo col-8">
                            <h3>{{$user->user->name}}</h3>
                            <p>{{$user->activities}}</p>
                            <div class="row">
                                @foreach($user->sectors as $sector)
                                    <span>{{$sector->name}}</span>
                                @endforeach
                            </div>
                            <div>
                                {{--<span>{{$user->countryName->name}}</span>--}}
                            </div>
                        </div>
                    </article>
                    <a href="{{route('directoryUser',['id' => $user->id])}}" class="Directory-profile"> Ver perfil </a>
                </li>
            @endforeach
        </ul>
    </section>
    {!! $users->render() !!}
@endsection