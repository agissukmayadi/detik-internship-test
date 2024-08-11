@extends('layout.admin')

@section('content-admin')
    <p class="">Hello! Welcome to Dashboard, <span class="font-semibold"> {{ $user->name }}</span></p>
    <p class="mt-1"> From your account dashboard you can manage data books and categories.</p>
@endsection
