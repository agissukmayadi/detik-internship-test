@extends('layout.master')

@section('content')
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="container flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">DetikBook.</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if (!empty($user))
                    <button type="button" class="flex text-sm bg-blue-800 rounded-full focus:ring-4 " aria-expanded="false"
                        data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="z-50 hidden my-4 text-base list-none  divide-y  rounded shadow-lg border-gray-600 bg-white divide-gray-300 text-gray-900"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm " role="none">
                                {{ $user->name }}
                            </p>
                            <p class="text-sm font-medium truncate" role="none">
                                {{ $user->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            @if ($user->role == 'admin')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="block px-4 py-2 text-sm  hover:bg-gray-100" role="menuitem">Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('user.book') }}" class="block px-4 py-2 text-sm  hover:bg-gray-100"
                                        role="menuitem">My
                                        Books</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm  hover:bg-gray-100"
                                    role="menuitem">Sign out</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                @endif
            </div>
        </div>
    </nav>
    <div class="mt-16"></div>
    <section class="w-full bg-blue-600 py-10">
        <div class="container mx-auto">
            <h1 class="text-center text-white text-3xl font-bold">{{ $title }}</h1>
        </div>
    </section>
    @yield('content-home')
    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="{{ route('home') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">DetikBook.</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="{{ route('home') }}" class="hover:underline me-4 md:me-6">Home</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://detik.com/"
                    class="hover:underline">DetikBook</a>. All Rights Reserved.</span>
        </div>
    </footer>
@endsection
