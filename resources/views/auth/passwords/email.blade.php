@extends('layouts.main')

@section('content')

@include('partials.status-panel')
@include('layouts.othermenu')  

<section>
        <div class="container">
            <div class="col-lg-4 col-sm-4 col-md-4"></div>
            <div class="col-lg-4 col-sm-4 col-md-4">
                <div class="vfrom_layout">
                    <h4>Password Reset</h4>
                {!! Form::open(['url' => url('/password/email'), 'class' => 'form-signin' ] ) !!}

        @include('includes.status')       
       
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail' ]) !!}

        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send me a reset link</button>

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




