@extends('layouts.header')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" 
             alt="Vona Crafts" class="mx-auto h-10 w-auto" />
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">
            Sign in to your account
        </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        @if($errors->any())
            <p class="text-red-400 text-sm mb-4">{{ $errors->first() }}</p>
        @endif

        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="login_email" class="block text-sm/6 font-medium text-gray-100">
                    Email address
                </label>
                <div class="mt-2">
                    <input id="login_email" type="email" name="login_email" 
                           required autocomplete="email"
                           class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base 
                                  text-white outline-1 -outline-offset-1 outline-white/10 
                                  placeholder:text-gray-500 focus:outline-2 
                                  focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                </div>
            </div>

            <div>
                <label for="login_password" class="block text-sm/6 font-medium text-gray-100">
                    Password
                </label>
                <div class="mt-2">
                    <input id="login_password" type="password" name="login_password" 
                           required autocomplete="current-password"
                           class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base 
                                  text-white outline-1 -outline-offset-1 outline-white/10 
                                  placeholder:text-gray-500 focus:outline-2 
                                  focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 
                               py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400">
                    Sign in
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-400">
            Not a member?
            <a href="/register" class="font-semibold text-indigo-400 hover:text-indigo-300">
                Register
            </a>
        </p>
    </div>
</div>
@endsection