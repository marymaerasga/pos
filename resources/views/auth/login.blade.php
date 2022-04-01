@extends('layouts.auth')
@section('content')
<div class="col-sm-8 col-md-6 col-lg-4 rounded p-4 shadow" style="background-color: #697184">
    <div class="row justify-content-center mb-4">
        <img src="{{ asset('assets/images/logo.png') }}" class="w-25" />
    </div>
    <div class="login-box">
<h4 class="login-box-msg text-center mb-5">LJ POS SYSTEM</h4>
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="mb-4">
    <div class="form-group">
        <div class="input-group">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="bi bi-envelope"></span>
                </div>
            </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="mb-4">
    <div class="form-group">

        <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                name="password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="bi bi-key"></span>
                </div>
            </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
 
    <div class="row">
        <div class="mb-4">
        <div class="col-8 mt-2">
            <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    Remember Me
                </label>
            </div>
        </div>
    </div>
        <!-- /.col -->
      
            <button type="submit" class="btn w-100 btn-block text-white rounded" style="background-color: #413f3d">Login</button>
        
        <!-- /.col -->
    </div>

</form>

<p class="mb-2">
    <a class="text-white float-end mt-3" href="{{ route('password.request') }}">Forgotpassword?</a>
</p>

   </div>
  </div>

@endsection