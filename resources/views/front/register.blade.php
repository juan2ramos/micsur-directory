@extends('layout.front')

@section('content')
    <form action="{{ route('register') }}" enctype="multipart/form-data" method="post" class="row Form-register">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h1 class="col-8 small-12  bottom-element">
            DIRECTORIO
            <b>INDUSTRIAS CREATIVAS Y CULTURALES</b>
        </h1>
        <div class="col-4 small-12 row Form-contentImageUser between">
            <div class="col-3 small-12 ">Imagen:</div>
            <figure class="col-9 small-12 Form-figure-user ">
                {!!  $errors->first('image-profile', '<p class="error">:message</p>')  !!}
                <output class="result"></output>
                <input type="file" name="image-profile" class="images" id="image-profile">
                <figcaption>¡Haz clic o arrastra la imagen!</figcaption>
            </figure>

        </div>
        <div class="col-8 offset-4 offset-small-0 small-12">
            <hr class="Form-hr">
            <label for="name" class="row middle">
                {!!  $errors->first('name', '<p class="error">:message</p>')  !!}
                <span class="col-5">Nombre:</span>
                <input class="col-7" name="name" id="name" value="{{ old('name') }}" type="text">
            </label>
            <label for="last-name" class="row middle">
                {!!  $errors->first('last-name', '<p class="error">:message</p>')  !!}
                <span class="col-5">Apellido:</span>
                <input class="col-7" name="last-name" value="{{ old('last-name') }}" id="last-name" type="text">
            </label>
            <label for="identification-number" class="row middle">
                {!!  $errors->first('identification-number', '<p class="error">:message</p>')  !!}
                <span class="col-5">Número de identificación:</span>
                <input class="col-7" name="identification-number" value="{{ old('identification-number') }}"
                       id="identification-number" type="text">
            </label>
            <label for="email" class="row middle">
                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                <span class="col-5">Email:</span>
                <input class="col-7" name="email" value="{{ old('email') }}" id="email" type="email">
            </label>
            <label for="password" class="row middle">
                {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                <span class="col-5">Contraseña:</span>
                <input class="col-7" name="password" id="password" type="password">
            </label>
            <label for="password_confirmation" class="row middle">
                <span class="col-5">Confirmar contraseña:</span>
                <input class="col-7" name="password_confirmation" id="password_confirmation" type="password">
            </label>
            <label for="country" class="row middle">
                {!!  $errors->first('country', '<p class="error">:message</p>')  !!}
                <span class="col-5">País:</span>
                <select class="col-7" name="country" id="sector">
                    <option value="">Selecciona el país</option>
                    @foreach($countries as $country)
                        <option value={{ $country->id }} {{(old('country')== $country->id )?'selected':''}}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="address" class="row middle">
                {!!  $errors->first('address', '<p class="error">:message</p>')  !!}
                <span class="col-5">Dirección:</span>
                <input class="col-7" name="address" value="{{ old('address') }}" id="address" type="text">
            </label>
            <label for="company" class="row middle">
                {!!  $errors->first('company', '<p class="error">:message</p>')  !!}
                <span class="col-5">Empresa:</span>
                <input class="col-7" name="company" value="{{ old('company') }}" id="company" type="text">
            </label>
            <label for="sector" class="row middle">
                {!!  $errors->first('sector', '<p class="error">:message</p>')  !!}
                <span class="col-5">Sector:</span>
                <select class="col-7" name="sector" id="sector">
                    <option value="">Selecciona el sector</option>
                    <option value="audiovisual" {{(old('sector')=='audiovisual')?'selected':''}}>Audiovisual
                    </option>
                    <option value="diseno" {{(old('sector')=='diseno')?'selected':''}}>Diseño</option>
                    <option value="musica" {{(old('sector')=='musica')?'selected':''}}>Música</option>
                    <option value="editorial" {{(old('sector')=='editorial')?'selected':''}}>Editorial</option>
                    <option value="animacion_videojuegos" {{(old('sector')=='animacion_videojuegos')?'selected':''}}>
                        Animación y Videojuegos
                    </option>
                    <option value="artes_escenicas" {{(old('sector')=='artes_escenicas')?'selected':''}}>Artes
                        escénicas
                    </option>
                </select>
            </label>
            <label for="activities" class="row middle">
                {!!  $errors->first('activities', '<p class="error">:message</p>')  !!}
                <span class="col-5   top-element">Actividad <em id="caracter"> (400 caracteres)</em>:</span>
                <textarea maxlength="400" class="col-7" name="activities"
                          id="activities">{{ old('activities') }}</textarea>
            </label>
            <label for="website" class="row middle">
                <span class="col-5">Sitio web:</span>
                <input class="col-7" name="website" id="website" value="{{ old('website') }}" type="text">
            </label>
            <label for="mobile" class="row middle">
                @if($errors->has('mobile') || $errors->has('mobile-1'))
                    <p class="error">El Teléfono móvil es obligatorio</p>
                @endif
                <span class="col-5 small-12">Teléfono móvil:</span>
                <input class="col-1 small-2" value="{{ old('mobile') }}" maxlength="3" name="mobile" id="mobile"
                       type="text">
                <div class="col-6 small-10" style="padding-left: 5px">
                    <input value="{{ old('mobile-1') }}" class="{{($errors->first('mobile'))?'error':''}}"
                           maxlength="15" name="mobile-1" id="mobile-1" type="text">
                </div>
            </label>
            <label for="phone" class="row middle">
                <span class="col-5 small-12">Teléfono fijo:</span>
                <input maxlength="3" class="col-1 small-2" name="phone" id="phone" value="{{ old('phone') }}"
                       type="text">
                <div class="col-1 small-2" style="padding-left: 5px"><input maxlength="3" value="{{ old('phone-1') }}"
                                                                            name="phone-1" id="phone-1" type="text">
                </div>
                <div class="col-5 small-8" style="padding-left: 5px"><input maxlength="15" value="{{ old('phone-2') }}"
                                                                            name="phone-2" id="phone-2" type="text">
                </div>
            </label>
        </div>
        <div class="row">
            <p class="col-8 offset-4 " style="text-align: justify;font-size: 15px">Le informamos que de acuerdo a nuestra Política de Privacidad. Toda la información acá consignada es
                propiedad de MICSUR y no tendrá fines de uso externos.

                Si tiene dudas por favor comuníquese con: <a style="color: #e85125" href="mailto:info@micsur.org">info@micsur.org</a> o <a style="color: #e85125"  href="mailto:ecultural@mincultura.gov.co">ecultural@mincultura.gov.co</a></p>
        </div>

        <div class="row col-12 end ">
            <button>REGISTRAR...</button>
        </div>

    </form>
    @if ( $errors->count() > 0 )
        <section class=" row center middle ErrorsAlert">
            <div class="ErrorsAlert-content">
                <span>X</span>
                <p>Tienes errores en algunos de los campos.</p>
            </div>
        </section>
    @endif
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/form.js')}}"></script>
@endsection