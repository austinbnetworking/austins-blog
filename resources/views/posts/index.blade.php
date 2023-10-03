{{-- Extend another layout --}}
@extends('layout.app')

{{-- Insert content into designated sections --}}
@section('page-title')
    Posts
@endsection

@section('content')
    <form action="{{ route('posts') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-4">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="30" rows="4"
                class="block w-full rounded-md py-3 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 @error('password') ring-2 ring-red-500 @enderror"
                placeholder="Post something"></textarea>
            @error('body')
                <div class="ring-0 text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit"
            class="font-semibold text-sm inline-flex items-center justify-center py-3 px-4 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">Post</button>
    </form>
    @if ($posts->count())
        @foreach ($posts as $post)
            <div class="mb-4">
                <a href="" class="font-bold">{{ $post->user->name }}</a> <span
                    class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                <p class="mb-2">{{ $post->body }}</p>
                <div class="flex items-center">
                    @auth
                        @if (!$post->likedBy(auth()->user()))
                            <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                        @else
                            <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                        @endif
                    @endauth
                    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <p>There are no posts.</p>
    @endif
@endsection
