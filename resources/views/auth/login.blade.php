@extends('layouts.app')

@section('content')



<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>Login</h2>
            </div>
            <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="col-md-6">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
</div>
            </div>
                <div class="mb-3">
                    <label class="form-label" for="password">
                        {{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        <div class="col-md-6">
                               
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
</div>
<div class="mb-3">

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

</div>
                </form>
        </div>
    </section>
</main>
@endsection
