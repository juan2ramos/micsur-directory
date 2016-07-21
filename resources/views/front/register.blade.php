@extends('layout.front')

@section('content')
    <form action="" class="row Form-register">
        <h1 class="col-8 small-12  bottom-element">
            DIRECTORIO
            <b>INDUSTRIAS CREATIVAS Y CULTURALES</b>
        </h1>
        <div class="col-4 small-12 row Form-contentImageUser between">
            <div class="col-3 small-12">Imagen:</div>
            <figure class="col-9 small-12 Form-figure-user ">
                <input type="file" name="image-profile" id="image-profile">
            </figure>
        </div>
        <div class="col-8 offset-4 offset-small-0 small-12">
            <hr class="Form-hr">
            <label for="name" class="row middle">
                <span class="col-5">Nombre:</span>
                <input class="col-7" name="name" id="name" type="text">
            </label>
            <label for="last-name" class="row middle">
                <span class="col-5">Apellido:</span>
                <input class="col-7" name="last-name" id="last-name" type="text">
            </label>
            <label for="identification-number" class="row middle">
                <span class="col-5">Número de identificación:</span>
                <input class="col-7" name="identification-number" id="identification-number" type="text">
            </label>
            <label for="email" class="row middle">
                <span class="col-5">Email:</span>
                <input class="col-7" name="email" id="email" type="email">
            </label>
            <label for="password" class="row middle">
                <span class="col-5">Contraseña:</span>
                <input class="col-7" name="password" id="password" type="password">
            </label>
            <label for="password_confirmation" class="row middle">
                <span class="col-5">Confirmar contraseña:</span>
                <input class="col-7" name="password_confirmation" id="password_confirmation" type="password">
            </label>
            <label for="company" class="row middle">
                <span class="col-5">Empresa:</span>
                <input class="col-7" name="company" id="company" type="text">
            </label>
            <label for="activities" class="row middle">
                <span class="col-5">Actividad:</span>
                <select class="col-7" name="activities" id="activities">
                    <option value="">Selecciona una opción</option>
                    <option value="">Selecciona una opción</option>
                    <option value="">Selecciona una opción</option>
                    <option value="">Selecciona una opción</option>
                </select>
            </label>
            <label for="what-i-do" class="row middle">
                <span class="col-5  top-element">A que me dedico:</span>
                <textarea class="col-7" name="what-i-do" id="what-i-do"> </textarea>
            </label>
            <label for="website" class="row middle">
                <span class="col-5">Sitio web:</span>
                <input class="col-7" name="website" id="website" type="text">
            </label>
            <label for="mobile" class="row middle">
                <span class="col-5 small-12">Teléfono móvil:</span>
                <input class="col-1 small-2" name="mobile" id="mobile" type="text">
                <div class="col-6 small-10" style="padding-left: 5px"><input name="mobile-1" id="mobile-1" type="text">
                </div>
            </label>
            <label for="phone" class="row middle">
                <span class="col-5 small-12">Teléfono fijo:</span>
                <input class="col-1 small-2" name="phone" id="phone" type="text">
                <div class="col-1 small-2" style="padding-left: 5px"><input name="phone-1" id="phone-1" type="text"></div>
                <div class="col-5 small-8" style="padding-left: 5px"><input name="phone-2" id="phone-2" type="text"></div>
            </label>
        </div>

    </form>
@endsection