@extends('layout.master')

@section('content')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen  py-4 transition-transform -translate-x-full  border-r  sm:translate-x-0 bg-gray-800 border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto  bg-gray-800">
            <div class="flex justify-between items-center mb-5">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-block text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">
                    DetikBook.
                </a>
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button" class="text-sm  rounded-lg sm:hidden  text-white">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>

            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group {{ Request::url() == route('admin.dashboard') ? 'bg-gray-700' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 text-gray-400 group-hover group-hover:text-white {{ Request::url() == route('admin.dashboard') ? 'text-white' : 'text-gray-400' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
            </ul>
            <p class="p-2 mt-3 text-sm text-white">Master data</p>
            <hr>
            <ul class="space-y-2 font-medium mt-2">
                <li>
                    <a href="{{ route('admin.category') }}"
                        class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group {{ Request::url() == route('admin.category') ? 'bg-gray-700' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 text-gray-400 group-hover group-hover:text-white {{ Request::url() == route('admin.category') ? 'text-white' : 'text-gray-400' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path fill-rule="evenodd"
                                d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                clip-rule="evenodd" />
                            <path
                                d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                        </svg>
                        <span class="ms-3">Category</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.book') }}"
                        class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group {{ Request::url() == route('admin.book') ? 'bg-gray-700' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 text-gray-400 group-hover group-hover:text-white {{ Request::url() == route('admin.book') ? 'text-white' : 'text-gray-400' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Book</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <nav class="sm:ml-64 bg-white shadow">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm  rounded-lg sm:hidden focus:outline-none focus:ring-2  text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3 ">
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 "
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                                <li>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm  hover:bg-gray-100"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="p-10 sm:ml-64 bg-gray-200 min-h-[calc(100vh-3.5rem)]  sm:max-w-[calc(100vw-16rem)] text-gray-900">
        <div>
            <h1 class="text-3xl font-bold">{{ $title }}</h1>
            <hr class="my-4 border-gray-900">
        </div>
        @yield('content-admin')
    </div>
@endsection
