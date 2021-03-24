@extends('layouts.auth')

{{-- @section('flash')
    @include('user.flash-message')
@endsection --}}
@include('auth.flash-message')
@section('auth-form')

<div class="login-form">
    <h4>LOGIN</h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" placeholder="Password" type="password"
                class="form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password">
            <span class="input-group-text" toggle="#password">
                    <i id="eye" class="fa fa-eye-slash toggle-password" style="color:black;"></i>
            </span>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="checkbox">

        </div>
        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Login</button>
        
    </form>
</div>
@endsection
@push('css')
<style>
    #eye{
        float: right;
        margin-right: 14px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>
@endpush
