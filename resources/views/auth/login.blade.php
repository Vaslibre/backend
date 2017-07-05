@extends('layouts.front')

@section('content')
<section id="login" class="login p-y-lg bg-color">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 text-center subscription">
                <h4 class="m-t-lg m-b-0 text-left center-md">Welcome Back.</h4>
                <p class="lead text-left center-md m-b-md">Login to your account</p>
                <form class="form-horizontal" role="form" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="sfEmail" class="text-edit">Email Address</label>
                        <input type="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your Email" required="">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="sfPassword" class="text-edit">Password</label>
                        <input id="password" type="password" class="form-control" name="password"  placeholder="Enter your Password" required="">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label class="text-edit">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-blue">LOGIN</button>
                    </div>
                </form>
                <div class="forgot text-left">
                    <a  href="{{ route('password.request') }}">Forgot your password?</a>              
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
