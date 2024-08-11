@extends('layout.master')

@section('content')
    <div
        class="w-full min-h-screen bg-gradient-to-b from-blue-500 to-blue-800 md:bg-gray-300 md:bg-none flex justify-center items-center px-3 md:px-10">
        <div class="flex flex-col bg-white w-full shadow-md rounded-md md:flex-row md:w-3/4 overflow-hidden">
            <div class="px-6 w-full md:w-1/2 py-10 md:py-14 md:px-8">
                <h2 class="text-lg font-semibold mb-4">{{ Request::url() == route('register') ? 'Sign up' : 'Sign in' }}</h2>
                @yield('form')
            </div>
            <div class="hidden md:flex md:w-1/2  bg-gradient-to-r from-blue-500 to-blue-800 md:items-center justify-center">
                <div class="text-white text-center">
                    <h1 class=" font-bold text-2xl">Welcome to
                        {{ Request::url() == route('register') ? 'Register' : 'Login' }}</h1>
                    <p class="text-sm">
                        {{ Request::url() == route('register') ? 'Already have an account?' : 'Dont have an account?' }}</p>
                    <a href="{{ Request::url() == route('register') ? route('login') : route('register') }}"
                        class="text-sm rounded-2xl border-2 px-6 py-1 inline-block mt-2 border-white">{{ Request::url() == route('register') ? 'Sign in' : 'Sign up' }}</a>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('home') }}" class="fixed top-2 right-2">
        <svg class="w-[28px] h-[28px] text-white md:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </a>
@endsection
