@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col m8 offset-m2">
            <div class="card-panel">
                <h5 class="header">{{ __('Register') }}</h5>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">

                        <div class="input-field col s12 m6">
                          <input placeholder="" id="first_name" type="text" name="first_name" class="validate" value="{{ old('first_name') }}"required autofocus>
                          <label for="first_name">First Name</label>
                        </div>  

                        <div class="input-field col s12 m6 ">
                          <input placeholder="" id="last_name" type="text" name="last_name" class="validate" value="{{ old('last_name') }}"required >
                          <label for="last_name">Last Name</label>
                        </div>  

                        <div class="input-field col m6 s12">
                          <input placeholder="" id="phone" type="text" name="phone" class="validate" value="{{ old('phone') }}"required autocomplete="off">
                          <label for="phone">Phone</label>
                        </div>  
                          
                        <div class="input-field col m6 s12">
                          <input placeholder="" id="email" type="email" name="email" class="validate" value="{{ old('email') }}"required autocomplete="off">
                          <label for="email">E-mail</label>
                        </div>  

                        <div class="input-field col m12 s12">
                         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                          <label for="password">Password</label>
                        </div>  

                        <div class="input-field col m12 s12">
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          <label for="password">Confirm password</label>
                        </div>  

                        <div class="col m12 right-align">
                             <button type="submit" class="btn grey">{{ __('Register') }}</button>
                        </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
