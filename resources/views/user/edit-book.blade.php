@extends('layout.home')

@section('content-home')
    <section class="w-full py-10 bg-gray-100">
        <div class="container mx-auto px-4  sm:px-10 ">
            <form class="w-full" method="POST" action="{{ route('user.book.update', $book->slug) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                    <input type="text" name="isbn" id="isbn"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $book->isbn }}" />
                    @error('isbn')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                        category</label>
                    <select id="category" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $book->title }}" />
                    @error('title')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $book->description }}</textarea>
                    @error('description')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="author"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                    <input type="text" name="author" id="author"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $book->author }}" />
                    @error('author')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="publisher"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
                    <input type="text" name="publisher" id="publisher"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $book->publisher }}" />
                    @error('publisher')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="publication_year"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publication
                        Year</label>
                    <input type="text" name="publication_year" id="publication_year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $book->publication_year }}" />
                    @error('publication_year')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="number" name="stock" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $book->stock }}" min="1" />
                    @error('stock')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <div class="flex items-center gap-4">
                        <div class="grow">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Book
                                File <span>(leave blank to leave unchanged)</span></label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_help" id="file" type="file" name="file"
                                accept="application/pdf">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_help">PDF (MAX. 10MB)</p>
                            @error('file')
                                <small class="text-red-500 ml-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <a href="{{ asset('storage/file/books/' . $book->file) }}"
                            class="block text-sm text-blue-500 hover:underline">{{ $book->file }}</a>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="flex flex-col sm:flex-row">
                        <div class="w-full sm:w-2/3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image
                                <span>(leave blank to leave unchanged)</span></label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="image_help" id="image" type="file" name="image"
                                accept="image/*">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">JPG, JPEG, PNG (MAX.
                                2MB)</p>
                            @error('image')
                                <small class="text-red-500 ml-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <img src="{{ asset('storage/img/books/' . $book->image) }}" class="w-full sm:w-1/3"
                            alt="">
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                <a href="{{ route('user.book') }}"
                    class="block  mt-2 sm:inline text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
            </form>
        </div>
    </section>
@endsection
