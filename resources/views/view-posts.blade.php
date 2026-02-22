@extends('layouts.header')

@section('content')
<div class="bg-gray-900 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
        <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Current Posts</h2> <h3 class="text-gray-300">Will be orders soon, WIP</h3>
        <p class="mt-2 text-lg/8 text-gray-300">See what the current situation looks like.</p>

            @auth
            <div class="flex gap-3 mb-8">
                    <a href="/ordering">
                    <button class="rounded-full bg-gray-800/60 px-4 py-1.5 text-sm font-medium text-gray-300 hover:bg-gray-800">
                        All Posts
                    </button>
                </a>
                <a href="/ordering?filter=mine">
                    <button class="rounded-full bg-gray-800/60 px-4 py-1.5 text-sm font-medium text-gray-300 hover:bg-gray-800">
                        My Posts
                    </button>
                </a>
                <a href="/create-post-page">
                    <button class="rounded-full bg-gray-800/60 px-4 py-1.5 text-sm font-medium text-gray-300 hover:bg-gray-800">
                        New Post
                    </button>
                </a>
            </div>
            @endauth
        </div>
        <ul role="list" class="divide-y divide-white/10"></ul>
        @foreach ($posts as $post)
    
        <div class="bg-gray-800 rounded-lg p-6 mb-4">
            <h3 class="text-lg font-semibold text-white">{{ $post->title }}</h3>
            <p class="mt-2 text-sm text-gray-400">{{ $post->body }}</p>
            <p class="mt-4 text-xs text-gray-500">Posted by {{ $post->user->name }}</p>
            @if (auth()->id() == $post->user_id)
                <div class="flex items-center gap-2 mt-4">
                    <a href="/edit-post/{{ $post->id }}" class="rounded-full bg-gray-600/60 px-4 py-1.5 text-sm font-medium text-gray-300 hover:bg-gray-500">
                        Edit
                    </a>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="rounded-full bg-gray-600/60 px-4 py-1.5 text-sm font-medium text-gray-300 hover:bg-gray-500">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>
    
        @endforeach
        </ul>
        </div>
    </div>
</div>
@endsection