@extends('layouts.guest')

@section('content')

            <!-- früh: temprano, fest:firme, Gemainsam: Juntos, toll: genial, rund:redondo, fertig:listo, Frühstück, desayuno
                brauche:necesito, schnell:rapido, lernt:aprende, reicht:suficiente
             -->
             <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row justify-content-center mt-3 mb-4">
                            <img class="img-fluid" src="{{ asset('img/profile.png') }}" alt="Profile">
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary col-md-5">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link col-md-6 m-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
@endsection
