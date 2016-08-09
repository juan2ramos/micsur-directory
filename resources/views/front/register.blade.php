@extends('layout.front')

@section('content')
    <form action="{{ route('register') }}" enctype="multipart/form-data" method="post"
          class="row Form-register bottom-element">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-12 small-12  bottom-element">
            <h1>
                {{trans('register.h1')}}
                <b>{{trans('register.h1Span')}}</b>
            </h1>
            <p style="text-align: justify; font-size: 15px;max-width: 100%;">
                {{trans('register.p1')}}
            </p>
            <p style="text-align: justify; font-size: 15px;max-width: 100%;">
                {{trans('register.p2')}}
            </p>
        </div>


        <div class="col-4 offset-8 small-12 row Form-contentImageUser between">
            <div class="col-3 small-12 ">{{trans('register.img')}}</div>
            <figure class="col-9 small-12 Form-figure-user ">
                {!!  $errors->first('image-profile', '<p class="error">:message</p>')  !!}
                <output class="result"></output>
                <input type="file" name="image-profile" class="images" id="image-profile">
                <figcaption>{{trans('register.caption')}}</figcaption>
            </figure>

        </div>
        <div class="col-8 offset-4 offset-small-0 small-12">
            <p>{{trans('register.p3')}}</p>
            <hr class="Form-hr">
            <label for="name" class="row middle">
                {!!  $errors->first('name', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span')}}</span>
                <input class="col-7" name="name" id="name" value="{{ old('name') }}" type="text">
            </label>
            <label for="last-name" class="row middle">
                {!!  $errors->first('last-name', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span1')}}</span>
                <input class="col-7" name="last-name" value="{{ old('last-name') }}" id="last-name" type="text">
            </label>
            <label for="identification-number" class="row middle">
                {!!  $errors->first('identification-number', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span2')}}</span>
                <input class="col-7" name="identification-number" value="{{ old('identification-number') }}"
                       id="identification-number" type="text">
            </label>
            <label for="email" class="row middle">
                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span3')}}</span>
                <input class="col-7" name="email" value="{{ old('email') }}" id="email" type="email">
            </label>
            <label for="password" class="row middle">
                {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span5')}}</span>
                <input class="col-7" name="password" id="password" type="password">
            </label>
            <label for="password_confirmation" class="row middle">
                <span class="col-5">{{trans('register.span6')}}</span>
                <input class="col-7" name="password_confirmation" id="password_confirmation" type="password">
            </label>
            <label for="country" class="row middle">
                {!!  $errors->first('country', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span8')}}</span>
                <select class="col-7" name="country" id="country">
                    <option value="">{{trans('register.span9')}}</option>
                    @foreach($countries as $country)
                        <option value={{ $country->id }} {{(old('country')== $country->id )?'selected':''}}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="address" class="row middle">
                {!!  $errors->first('address', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span10')}}</span>
                <input class="col-7" name="address" value="{{ old('address') }}" id="address" type="text">
            </label>
            <label for="company" class="row middle">
                {!!  $errors->first('company', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span11')}}</span>
                <input class="col-7" name="company" value="{{ old('company') }}" id="company" type="text">
            </label>
            <label for="sector" class="row middle">
                {!!  $errors->first('sector', '<p class="error">:message</p>')  !!}
                <span class="col-5">{{trans('register.span12')}}</span>
                <select class="col-7" name="sector[]" id="sector" multiple="multiple">
                    <option value="">{{trans('register.span13')}}</option>
                    @foreach($sectors as $id => $sector)
                        <option value="{{$id}}" {{(old('sector')==$sector)?'selected':''}}>{{$sector}}</option>
                    @endforeach
                </select>$sector
            </label>
            <label for="activities" class="row middle">
                {!!  $errors->first('activities', '<p class="error">:message</p>')  !!}
                <span class="col-5   top-element">{{trans('register.span14')}}<em id="caracter"></em></span>
                <textarea maxlength="400" class="col-7" name="activities"
                          id="activities">{{ old('activities') }}</textarea>
            </label>
            <label for="website" class="row middle">
                <span class="col-5">{{trans('register.span15')}}</span>
                <input class="col-7" name="website" id="website" value="{{ old('website') }}" type="text">
            </label>
            <label for="mobile" class="row middle">
                @if($errors->has('mobile') || $errors->has('mobile-1'))
                    <p class="error">{{trans('register.span16')}}</p>
                @endif
                <span class="col-5 small-12">{{trans('register.span17')}}</span>
                <input class="col-1 small-2" value="{{ old('mobile') }}" maxlength="3" name="mobile" id="mobile"
                       type="text">
                <div class="col-6 small-10" style="padding-left: 5px">
                    <input value="{{ old('mobile-1') }}" class="{{($errors->first('mobile'))?'error':''}}"
                           maxlength="15" name="mobile-1" id="mobile-1" type="text">
                </div>
            </label>
            <label for="phone" class="row middle">
                <span class="col-5 small-12">{{trans('register.span18')}}</span>
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
            <p class="col-8 offset-4 " style="text-align: justify;font-size: 15px;max-width:100%">{{trans('register.p4')}} <a style="color: #e85125"
                                                             href="mailto:coordinaciondirectorio@micsur.org">coordinaciondirectorio@micsur
                    .org</a> o <a style="color: #e85125" href="mailto:ecultural@mincultura.gov.co">ecultural@mincultura
                    .gov.co</a></p>
        </div>

        <div class="row col-12 end ">
            <button>{{trans('register.button2')}}</button>
        </div>

    </form>
    @if ( $errors->count() > 0 )
        <section class=" row center middle ErrorsAlert">
            <div class="ErrorsAlert-content">
                <span>X</span>
                <p>{{trans('register.p5')}}</p>
            </div>
        </section>
    @endif
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('js/form.js')}}"></script>
    <script type="text/javascript">
        $('#sector').select2({
            closeOnSelect: false
        });

    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection