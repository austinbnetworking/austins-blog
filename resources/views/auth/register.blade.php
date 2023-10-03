{{-- Extend another layout --}}
@extends('layout.app')

{{-- Insert content into designated sections --}}
@section('page-title')
    Register
@endsection

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name"
                class="block w-full rounded-md py-3 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 @error('name') ring-2 ring-red-500 @enderror"
                placeholder="Your name" value="{{ old('name') }}">
            @error('name')
                <div class="ring-0 text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username"
                class="block w-full rounded-md py-3 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 @error('username') ring-2 ring-red-500 @enderror"
                placeholder="Username" value="{{ old('username') }}">
            @error('username')
                <div class="ring-0 text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="sr-only">Email Address</label>
            <input type="email" name="email" id="email"
                class="block w-full rounded-md py-3 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 @error('email') ring-2 ring-red-500 @enderror"
                placeholder="Email Address" value="{{ old('email') }}">
            @error('email')
                <div class="ring-0 text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password"
                class="block w-full rounded-md py-3 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 @error('password') ring-2 ring-red-500 @enderror"
                placeholder="Password">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="sr-only">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="block w-full rounded-md py-3 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 @error('password') ring-2 ring-red-500 @enderror"
                placeholder="Password Confirmation">
            @error('password')
                <div class="ring-0 text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
            @error('password_confirmation')
                <div class="ring-0 text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit"
            class="font-semibold text-sm inline-flex items-center justify-center py-3 px-4 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">Register
            Now</button>
    </form>
@endsection
