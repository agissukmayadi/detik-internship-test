@extends('layout.home')

@section('content-home')
    <section class="w-full py-10 bg-gray-100">
        <div class="container mx-auto px-4  sm:px-10 ">
            <div class="flex flex-col sm:flex-row sm:items-start gap-3 border bg-white p-4 rounded-md  shadow-md w-full">
                <img src="{{ asset('storage/img/books/' . $book->image) }}" class="w-full sm:w-1/3" alt="">
                <div class=" w-full">
                    <h1 class="text-2xl  font-semibold">{{ $book->title }}</h1>
                    <p>Author : {{ $book->author . ' (' . $book->publication_year . ')' }} </p>
                    <hr class="border-gray-400 my-3">
                    <p class=" text-justify text-gray-600  text-sm">{{ $book->description }}</p>
                    <hr class="border-gray-400 my-3">
                    <h2 class="text-xl">Detail Information</h2>
                    <div class="">
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">ISBN</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->isbn }}</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">Title</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->title }}</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">Category</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->category->name }}</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">Author</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->author }}</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">Publisher</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->publisher }}</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">Publication Year</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->publication_year }}</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">File</p>
                            <a href="{{ asset('storage/file/books/' . $book->file) }}"
                                class="text-sm w-1/2 text-left text-blue-600 hover:underline"> : Download
                                File</a>
                        </div>
                        <hr class="border-gray-400 my-3">
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">Uploaded At</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->created_at }}</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <p class="text-sm font-medium w-1/2">Uploaded By</p>
                            <p class="text-sm w-1/2 text-left"> : {{ $book->uploaded_by->name }}</p>
                        </div>
                    </div>
                    <a href="{{ route('user.book') }}"
                        class="bg-red-500 text-white px-4 py-1.5 text-sm rounded-lg inline-block w-full text-center mt-3">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
