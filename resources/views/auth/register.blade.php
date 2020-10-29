@extends('client.client_login')
@section('client_login_content')
<!-- Start wrapper-->
<div id="wrapper">
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase text-center pb-2">{{ __('Sign Up') }}</div>
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Sign Up') }}">
                    @csrf
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="name" class="sr-only">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-rounded" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-position"><i class="icon-user"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="phone" class="sr-only">{{ __('Phone') }}</label>
                            <input id="phone" name="phone" value="{{ old('phone') }}" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} form-control-rounded" placeholder="Phone" required autofocus>
                            @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-position"><i class="icon-bell"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-rounded" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Email ID" required>
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
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-rounded" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-position"><i class="icon-lock"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control form-control-rounded" placeholder="Confirm Password" required>
                            <div class="form-control-position"><i class="icon-lock"></i></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light">{{ __('Sign Up') }}</button>
                    <div class="text-center pt-3">
                        <hr>
                        <p class="text-muted">Already have an account? <a href="{{ route('login') }}"> Sign In here</a></p>
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
