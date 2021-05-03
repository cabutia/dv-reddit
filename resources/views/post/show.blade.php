@extends('layouts.web')

@section('content')
  <div class="container mx-auto bg-white rounded">
    <div class="w-full py-4 px-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl mb-4">{{ $post->title }}</h1>
        <div class="flex items-center">
          <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">Created at {{ $post->created_at }}</span>
        </div>
      </div>
      <p>{{ $post->content }}</p>
    </div>
    <div class="w-full px-6 py-4 flex justify-center border-t">
      <form action="{{ route('post.delete') }}" method="POST">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{ $post->id }}">
        <button type="submit" class="px-4 py-2 rounded font-semibold text-red-700 hover:bg-red-100">
          Delete Post
        </button>
      </form>
    </div>
  </div>
@endsection