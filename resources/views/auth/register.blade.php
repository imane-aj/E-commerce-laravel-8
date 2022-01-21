@extends('inc.master')

@section('content')
<section class="register">
    <div class="container">
    @include('layouts.alerts')
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>Sign Up</h3>
                <div class="name">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                        required autocomplete="name" placeholder="Name" aria-describedby="basic-addon1" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                        <input id="name" type="text" class="form-control @error('last_name') is-invalid @enderror" 
                        name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" 
                        aria-describedby="basic-addon1" autofocus placeholder="Last name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fal fa-envelope-open-text"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                    name="email" value="{{ old('email') }}" required autocomplete="email"
                    aria-describedby="basic-addon1" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <p>We'll never share your email with anyone else.</p>
                <div class="radio">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <div class="name">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-city"></i></span>
                        <input type="text" class="form-control" placeholder="City" aria-describedby="basic-addon1" name='city'>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-map-marker-alt"></i></span>
                        <input type="text" name='address' class="form-control" 
                        aria-describedby="basic-addon1" placeholder="Adress">
                    </div>
                </div>
                <div class="name">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fal fa-unlock-alt"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="new-password" aria-describedby="basic-addon1" 
                        placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fal fa-unlock-alt"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                        required autocomplete="new-password" aria-describedby="basic-addon1"
                        placeholder="Repeat password">
                    </div>
                </div> 
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fal fa-phone-alt"></i></span>
                    <input type="number" class="form-control" placeholder="Your cell phone" aria-describedby="basic-addon1"  name='phone'>
                </div>
                <div class="box">
                    <input class="form-check-input" type="checkbox" id="terms" value="option1">
                    <label class="form-check-label" for="terms">I am agree with <a href="#">terms and contitions</a></label>
                </div>
                <button type="submit" class="btn w-50">
                    {{ __('Register') }}
                </button> 
            </form>
            <div class="go-account">
                <p class="text-center">Have an account?<a href="{{ url('/login') }}"> Log In</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
