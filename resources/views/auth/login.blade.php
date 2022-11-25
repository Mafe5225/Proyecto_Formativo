@extends('layouts.login')
    @section('content')
        <div class="container">
            <div class="content">
                <img src="{{ asset('images/logoTienda.png') }}" alt="logo" class="logo position-absolute top-3 start-50 translate-middle mt-1">
           
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label class="text-black" for="email" :value="__('Email')" /><br>

                        <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label class="text-black" for="password" :value="__('Password')" /><br>

                        <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="text-black">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button class="btn btn-dark">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
