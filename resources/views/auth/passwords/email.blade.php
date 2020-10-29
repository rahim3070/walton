@extends('client.client_login')
@section('client_login_content')
<!-- Start wrapper-->
<div id="wrapper">
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase text-center pb-2">{{ __('Reset Password') }}</div>
                <p class="text-center pb-2">Please enter your email address. You will receive a link to create a new password via email.</p>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-rounded" placeholder="Email Address" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-position"><i class="icon-envelope-open"></i></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light mt-3">{{ __('Send Password Reset Link') }}</button>
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
