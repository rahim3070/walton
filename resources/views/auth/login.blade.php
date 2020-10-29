@extends('client.client_login')
@section('client_login_content')
<!-- Start wrapper-->
<div id="wrapper">
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase text-center pb-2">Sign In</div>
                <div class="card-title text-center pb-2">
                    <h6 style="color:red; text-align: center;">
                        <?php
                        $exception = Session::get('exception');

                        if ($exception) {
                            echo $exception;
                            Session::put('exception', null);
                        }
                        ?>                            
                    </h6>
                    <h6 style="color:green; text-align: center;">
                        <?php
                        $message = Session::get('message');

                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        ?>                            
                    </h6>
                </div>
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-rounded" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Email" required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                            <div class="form-control-position"><i class="icon-user"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-rounded" name="password" autocomplete="off" placeholder="Password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-position"><i class="icon-lock"></i></div>
                        </div>
                    </div>
                    <div class="form-row mr-0 ml-0">
                        <div class="form-group col-6">
                            <div class="demo-checkbox">
                                <input id="remember" name="remember" type="checkbox" class="filled-in chk-col-primary" checked=""  {{ old('remember') ? 'checked' : '' }}/>
                                       <label for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="form-group col-6 text-right">
                            <!--<a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>-->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light">{{ __('Sign In') }}</button>
                </form>
                <div class="text-center pt-3">
                    <hr>
                    <p class="text-muted">Do not have an account? <a href="{{ route('register') }}"> {{ __('Sign Up here') }}</a></p>
                </div>
            </div>
        </div>
    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
</div>
<!--wrapper-->
@endsection
