@extends('layouts.header')

@section('content')
<form action="/edit-post/{{ $post->id }}" method="POST">
  @csrf
  @method("PUT")
  <div class="space-y-12">
    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-white/10 pb-12 md:grid-cols-3">
      <div>
        <h2 class="text-base/7 font-semibold text-white">Edit Post</h2>
        <p class="mt-1 text-sm/6 text-gray-400">This information will be displayed publicly so be careful what you share.</p>
      </div>

      <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-white">Post Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input id="title" type="text" name="title" value="{{ $post->title }}" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>

        <div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium text-white">Post Contents:</label>
          <div class="mt-2">
            <textarea id="body" name="body" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">{{ $post->body }}</textarea>
          </div>
        </div>

        <button type="submit" class="rounded-full bg-gray-800/60 px-4 py-1.5 text-sm font-medium text-gray-300 hover:bg-gray-800">
            Post
        </button>

      </div>
    </div>
</form>

@endsection