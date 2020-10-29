@extends('client.client_login')
@section('client_login_content')
<!-- Start wrapper-->
<div id="wrapper">
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase text-center pb-2">{{ __('Reset Password') }}</div>
                <p class="text-center pb-2">Please enter your email address. You will receive a link to create a new password via email.</p>
                <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                            <input id="email" name="email" value="{{ $email ?? old('email') }}" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-rounded" placeholder="Email Address" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-position"><i class="icon-envelope-open"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-rounded" placeholder="Email Address" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-position"><i class="icon-envelope-open"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control form-control-rounded" placeholder="Email Address" required>
                            <div class="form-control-position"><i class="icon-envelope-open"></i></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-round btn-block waves-effect waves-light mt-3">Reset Password</button>
                    <div class="text-center pt-3">
                        <hr>
                        <p class="text-muted">Return to the <a href="authentication-signin.html"> Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
</div>
<!--wrapper-->
@endsection
