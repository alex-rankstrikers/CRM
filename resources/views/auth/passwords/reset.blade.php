@extends('layouts.main')

@section('content')

@include('partials.status-panel')
@include('layouts.othermenu')  

<section style="min-height: 400px">
        <div class="container" style="margin-top: 150px;">
            <div class="col-lg-4 col-sm-4 col-md-4"></div>
            <div class="col-lg-4 col-sm-4 col-md-4">
                <div class="vfrom_layout">
                    <h4>Set New Password</h4>
                   {!! Form::open(['url' => url('/password/reset/'), 'class' => 'form-signin', 'method' => 'post' ] ) !!}

        @include('includes.errors')

        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">      

       
        {!! Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Email address',
            'required',
            'id'                            => 'inputEmail',
            'data-parsley-required-message' => 'Email is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-type'             => 'email',
            'autofocus'
        ]) !!}


        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required',  'id' => 'inputPassword' ]) !!}


       
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation', 'required',  'id' => 'inputPasswordConfirmation' ]) !!}


        <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>

        {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4"></div>
        </div>        
    </section>


@stop

@section('footer')

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.5.0/parsley.min.js"></script>

@stop

