@extends('layout.back')

@section('content')
    <section class="Directory">
        <h1>DIRECTORIO</h1>
        <form action="" class="row middle">
            <label class="col-4" for=""><input type="text" name="name"></label>
            <label class="col-4" for=""> <input type="text" name="country"></label>
            <label class="col-4" for=""> <input type="text" name="sector"></label>
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
                                    <span >{{$sector->name}}</span>
                                @endforeach
                            </div>
                            <div>
                                {{--<span>{{$user->countryName->name}}</span>--}}
                            </div>
                        </div>
                    </article>
                    <a href="" class="Directory-profile"> Ver perfil </a>
                </li>
            @endforeach
        </ul>
    </section>
    {!! $users->render() !!}
@endsection