{{-- Extend another layout --}}
@extends('layout.app')

{{-- Insert content into designated sections --}}
@section('page-title')
    {{ $user->name }}
@endsection

@section('content')
    <h2 class="text-xl mb-1">User posts</h2>
    <h3 class="text-lg mb-2">{{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</h3>
    <h3 class="text-lg mb-2 text-blue-500">{{ $user->recievedLikes->count() }} {{ Str::plural('like', $user->recievedLikes->count()) }}</h3>
    <hr class="mb-4">
    @if ($posts->count())
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach

        {{ $posts->links('pagination::tailwind') }}
    @else
        <p>{{ $user->name }} does not have any posts.</p>
    @endif
@endsection
