@extends('layout.front')

@section('content')
    <form action="{{ route('register') }}" enctype="multipart/form-data"  method="post" class="row Form-register">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h1 class="col-8 small-12  bottom-element">
            DIRECTORIO
            <b>INDUSTRIAS CREATIVAS Y CULTURALES</b>
        </h1>
        <div class="col-4 small-12 row Form-contentImageUser between">
            <div class="col-3 small-12">Imagen:</div>
            <figure class="col-9 small-12 Form-figure-user ">
                {!!  $errors->first('image-profile', '<p class="error">:message</p>')  !!}
                <input type="file" name="image-profile"  id="image-profile">
            </figure>
        </div>
        <div class="col-8 offset-4 offset-small-0 small-12">
            <hr class="Form-hr">
            <label for="name" class="row middle">
                {!!  $errors->first('name', '<p class="error">:message</p>')  !!}
                <span class="col-5">Nombre:</span>
                <input class="col-7" name="name" id="name"  value="{{ old('name') }}" type="text">
            </label>
            <label for="last-name" class="row middle">
                {!!  $errors->first('last-name', '<p class="error">:message</p>')  !!}
                <span class="col-5">Apellido:</span>
                <input class="col-7" name="last-name"  value="{{ old('last-name') }}" id="last-name" type="text">
            </label>
            <label for="identification-number" class="row middle">
                {!!  $errors->first('identification-number', '<p class="error">:message</p>')  !!}
                <span class="col-5">Número de identificación:</span>
                <input class="col-7" name="identification-number" value="{{ old('identification-number') }}" id="identification-number" type="text">
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
            <label for="company" class="row middle">
                {!!  $errors->first('company', '<p class="error">:message</p>')  !!}
                <span class="col-5">Empresa:</span>
                <input class="col-7" name="company" value="{{ old('company') }}"  id="company" type="text">
            </label>
            <label for="activities" class="row middle">
                {!!  $errors->first('activities', '<p class="error">:message</p>')  !!}
                <span class="col-5">Actividad:</span>
                <select class="col-7" name="activities" id="activities">
                    <option value="">Selecciona una opción</option>
                    <option value="dd">Selecciona una opción</option>
                    <option value="d">Selecciona una opción</option>
                    <option value="d">Selecciona una opción</option>
                </select>
            </label>
            <label for="what-i-do" class="row middle">
                {!!  $errors->first('what-i-do', '<p class="error">:message</p>')  !!}
                <span class="col-5  top-element">A que me dedico:</span>
                <textarea class="col-7" name="what-i-do" id="what-i-do">{{ old('what-i-do') }} </textarea>
            </label>
            <label for="website" class="row middle">
                <span class="col-5">Sitio web:</span>
                <input class="col-7" name="website" id="website" value="{{ old('website') }}" type="text">
            </label>
            <label for="mobile" class="row middle">
                {!!  $errors->first('mobile', '<p class="error">:message</p>')  !!}
                <span class="col-5 small-12">Teléfono móvil:</span>
                <input class="col-1 small-2" value="{{ old('mobile') }}" maxlength="3" name="mobile" id="mobile" type="text">
                <div class="col-6 small-10" style="padding-left: 5px">
                    <input value="{{ old('mobile-1') }}" class="{{($errors->first('mobile'))?'error':''}}" maxlength="15" name="mobile-1" id="mobile-1" type="text">
                </div>
            </label>
            <label for="phone" class="row middle">
                <span class="col-5 small-12">Teléfono fijo:</span>
                <input  maxlength="3"  class="col-1 small-2" name="phone" id="phone" value="{{ old('phone') }}"  type="text">
                <div class="col-1 small-2" style="padding-left: 5px"><input  maxlength="3"  value="{{ old('phone-1') }}" name="phone-1" id="phone-1" type="text">
                </div>
                <div class="col-5 small-8" style="padding-left: 5px"><input  maxlength="15"  value="{{ old('phone-2') }}"  name="phone-2" id="phone-2" type="text">
                </div>
            </label>
        </div>
        <div class="row col-12 end ">
            <button>REGISTRAR...</button>
        </div>
    </form>
@endsection