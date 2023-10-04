{{-- Extend another layout --}}
@extends('layout.app')

{{-- Insert content into designated sections --}}
@section('page-title')
    Single Post
@endsection

@section('content')
    <x-post :post="$post" />
@endsection
