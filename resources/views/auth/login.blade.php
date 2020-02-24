@extends('layouts.main-login')

@section('content')


<section class="contact-page" style="height: 100%">


        <div class="container" style="margin-top: 100px;">
            <div class="col-lg-3 col-sm-3 col-md-3"></div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="vfrom_layout form-design" style="    background: #fff;
    padding: 25px;
    color: #000;-webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
    box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);">
                <div class="form-group text-center" style="margin-bottom:20px;" >   
	<img class="img-responsive " style="width:50%;display:initial;" src="{{'aplbc/Insigthslogo-02.svg'}}"></img></div>
                    {!! Form::open(['url' => url('login'), 'class' => 'contact-form', 'data-parsley-validate' ] ) !!}   
					@include('includes.status')					
                        <div class="form-group">  
                       
							{!! Form::email('email', null, [
            'class'                         => '',
            'placeholder'                   => 'Email address',
            'required',
            'id'                            => 'inputEmail',
            'data-parsley-required-message' => 'Email is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-type'             => 'email'
        ]) !!}
                        </div>
                        <div class="form-group">
					                     
                          {!! Form::password('password', [
            'class'                         => '',
            'placeholder'                   => 'Password',
            'required',
            'id'                            => 'inputPassword',
            'data-parsley-required-message' => 'Password is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-minlength'        => '6',
            'data-parsley-maxlength'        => '20'
        ]) !!}
                        </div>                       
                        <!-- <p><a href="{{url('password/reset')}}">Forgot Password?</a></p>
						<p>&nbsp;</p> -->
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Log in</button> 
                        </div>
						<!--  <hr style="margin-bottom: 10px;">
                        <div class="form_direct_log">
                            <div class="small pull-left">Want to list a new hotel?</div>
                            <div class="pull-right"><a class="log_sign" href="{{url('register')}}">Sign Up</a></div>
                        </div> -->
                        <?php /*<span><span>or</span></span>
                        <hr style="margin-top: 0px;">
                        <div class="facebook">
                            <button class="form-control btn btn-default">
                            <i class="fa fa-facebook" aria-hidden="true"></i>Continue with Facebook</button> 
                        </div>
                        <div class="google">
                            <button class="form-control btn btn-default"><i class="fa fa-google-plus" aria-hidden="true"></i>Continue with Google</button> 
                        </div>
                        <hr style="margin-bottom: 10px;">
                        <div class="form_direct_log">
                            <div class="small pull-left">Want to list a new venue?</div>
                            <div class="pull-right"><button class="log_sign">Sign Up</button></div>
                        </div>
						*/?>
                     {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3"></div>
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

@stop