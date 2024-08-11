@extends('layout.home')

@section('content-home')
    <section class="w-full  bg-gray-100 py-10">
        <div class="container mx-auto flex flex-col sm:flex-row  sm:px-40">

            <div class="w-full sm:w-1/3 shrink-0 p-4">
                <form action="{{ route('home') }}" method="GET">
                    <div class="mb-3">
                        <label for="title" class="font-semibold mb-2 block">Search : </label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="title" name="title" value="{{ request('title') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search book title..." />
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="font-semibold mb-2">Category : </p>
                        <div class="space-y-2 mt-1">
                            @foreach ($categories as $category)
                                <div class="flex items-center">
                                    <input id="{{ 'category-' . $category->id }}" type="checkbox"
                                        value="{{ $category->id }}" name="category[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}>
                                    <label for="{{ 'category-' . $category->id }}"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        @if (!empty(request('category')) || !empty(request('title')))
                            <a href="{{ route('home') }}"
                                class="text-center flex items-center text-sm w-full justify-center gap-2 py-2  mb-1">Clear
                                All <i class="fa-solid fa-xmark"></i></a>
                        @endif
                        <button type="submit"
                            class="w-full text-sm bg-blue-700 hover:bg-blue-800 text-white py-2 rounded-md">Apply
                            Filter</button>
                    </div>
                </form>
            </div>
            <div class="flex p-4 flex-col w-full gap-4">
                @if (session('error'))
                    <div id="alert-2"
                        class="flex items-center p-4 mb-4 text-red-800 rounded-lg border  border-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('error') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                @if ($books->count() > 0)
                    @foreach ($books as $book)
                        <div class="w-full p-4 bg-white shadow-md rounded-md flex items-start gap-4">
                            <div class="w-1/3">
                                <img src="{{ asset('storage/img/books/' . $book->image) }}" class="w-full" alt="">
                            </div>
                            <div class="w-2/3 flex flex-col h-full justify-between">
                                <div class="">
                                    <a href="{{ route('book.detail', $book->slug) }}"
                                        class="text-lg font-semibold line-clamp-6 hover:text-blue-500">{{ $book->title }}</a>
                                    <p>Author : {{ $book->author . ' (' . $book->publication_year . ')' }}</p>
                                    <hr class="my-2">
                                    <p class="line-clamp-5 text-sm">{{ $book->description }}</p>
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('book.detail', $book->slug) }}"
                                        class=" text-sm block w-full bg-blue-600 text-white py-2 text-center mt-2 hover:bg-blue-700 rounded">Detail</a>
                                    <a href="{{ asset('storage/file/books/' . $book->file) }}"
                                        class=" text-sm block w-full bg-yellow-400 text-white py-2 text-center mt-2 hover:bg-yellow-500 rounded">Download
                                        File</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1 class="text-lg font-semibold">Sorry! Book not found</h1>
                @endif
                {{ $books->links() }}
            </div>
        </div>
    </section>
@endsection
