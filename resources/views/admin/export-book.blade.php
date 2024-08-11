@extends('layout.master')

@section('content')
    <h1 class="text-center">
        Book Data Report
    </h1>
    <p>Date : {{ now() }}</p>
    <table>
        <tr>
            <th>No</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Publication Year</th>
            <th>stock</th>
            <th>File</th>
            <th>Image</th>
            <th>Uploaded By</th>
            <th>Uploaded At</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->stock }}</td>
                <td>{{ $book->file }}</td>
                <td>{{ $book->image }}</td>
                <td>{{ $book->uploaded_by->name }}</td>
                <td>{{ $book->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection
