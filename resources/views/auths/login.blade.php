@extends('layouts.app-out')

@section('content')
<div style="background-image: url({{ asset('images/auth-bg.jpg') }}); background-size: cover; background-position: center;">

    {{-- <img src="{{ asset('images/auth-bg.jpg') }}" alt="pohto" /> --}}
    <form action="{{ route('login') }}"  method="post" class="min-h-screen py-6 lg:px-36 flex flex-col lg:flex-row justify-center lg:items-center sm:py-12" >
        @csrf

        <div class="relative py-10 sm:max-w-md px-0 lg:w-[500px] bg-cover bg-auth-pattern dark:bg-auth-pattern-dar">

            <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-red-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>

            <div class="relative py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

            <div class="max-w-md mx-auto">

                <div >
                <h1 class="text-xl font-semibold text-center">FlexSMS - Login</h1>
                </div>

                <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                    <div class="relative mt-4">
                    <input autocomplete="off" id="email" name="email" type="text" class="text-sm peer placeholder-transparent rounded rounded-md h-10 w-full border shadow shadow-sm border-gray-300  text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" />
                    {{-- <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label> --}}
                    </div>
                    <div class="relative py-4">
                    <input autocomplete="off" id="password" name="password" type="password" class="text-sm peer placeholder-transparent rounded rounded-md h-10 w-full shadow shadow-sm border border-gray-300  text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Password" />
                    {{-- <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label> --}}
                    </div>

                    @if (session('error'))
                    <div class="text-red-500 bg-red-300/20 border-red-300/20 p-3 text-sm">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="relative pt-4">
                    <button class="bg-gradient-to-l from-red-400 to-red-500 text-white rounded-md px-2 py-1 w-full">Se connecter</button>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>

        {{-- <div class="text-center text-gray-500 text-sm mt-4">
            <p class="text-2xl font-semibold text-gray-500">Connectez-vous à votre compte !</a></p>
        </div> --}}

    </form>

</div>
@endsection
