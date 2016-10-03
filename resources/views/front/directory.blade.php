@extends('layout.back')

@section('content')

    <div class="row between middle">
        <h1>DIRECTORIO</h1>
        <a class="Directory-MeProfile" href="{{route('profile')}}">{{Auth::user()->name}}</a>
    </div>
    <form action="{{route('directoryPost')}}" method="post" class="row middle center Directory-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="col-4" for="">
            <input class="col-10" type="text" name="name" value="{{old('name')}}" placeholder="Nombre">
        </label>
        <label class="col-4" for="">
            <select class="col-10" name="country" id="country">
                <option value="" >Selecciona el país</option>
                @foreach($countries as $country )
                    <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>

        </label>
        <label class="col-4" for="">
            <select class="col-10" name="sector[]"  id="sector" multiple="multiple">
                <option value="" >Sectores</option>
                @foreach($sectors as $id => $sector)
                    <option value="{{$id}}">{{$sector}}</option>
                @endforeach
            </select>
        </label>
        <div class="col-12 row">
            <button>BUSCAR</button>
        </div>
    </form>
    <section class="Directory">

        <ul class="row">
            @foreach($users as $user)
                <li class="col-6 small-12">
                    <article class="row">

                        <figure class="col-4">
                            @if( !empty($user->user['image-profile']))
                                <img src="{{asset('uploads/profiles/' . $user->user['image-profile'])}}" alt="">
                            @else
                                <img src="{{asset('images/micsur.png')}}" alt="">
                            @endif

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
@section('scripts')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $('#country').select2();
        $('#sector').select2({

            placeholder: "Sectores"
        });
    </script>
@endsection
@section('styles')
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
@endsection