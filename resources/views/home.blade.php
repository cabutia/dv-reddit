@extends('layouts.web')

@section('content')
  <div class="container mx-auto bg-white">
    <div class="w-2/3 py-4">
      <form class="w-full px-6" action="{{ route('post.create') }}" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
          @if(Session::has('success_message'))
            <div class="bg-green-100 text-green-600 border border-green-300 px-4 py-2 rounded mb-2">
              {{ Session::get('success_message') }}
            </div>
          @endif

          <div class="flex flex-col mb-2 w-1/2">
            <label for="title" class="text-sm font-bold text-gray-700">Titulo del post</label>
            <input type="text" name="title" class="px-2 py-1 text-gray-900 rounded border" placeholder="Some title">
            @if($errors->has('title'))
              <div class="border border-red-400 bg-red-100 rounded px-4 py-2 flex flex-col mt-2">
                @foreach($errors->get('title') as $message)
                  <span class="text-red-400 text-sm">
                    {{ $message }}
                  </span>
                @endforeach
              </div>
            @endif
          </div>


          <div class="flex flex-col mb-2">
            <label for="content" class="text-sm font-bold text-gray-700">Contenido del post</label>
            <textarea name="content" class="px-2 py-1 text-gray-900 rounded border">Que estas pensando?</textarea>
            @if($errors->has('content'))
              <div class="border border-red-400 bg-red-100 rounded px-4 py-2 flex flex-col mt-2">
                @foreach($errors->get('content') as $message)
                  <span class="text-red-400 text-sm">
                    {{ $message }}
                  </span>
                @endforeach
              </div>
            @endif
          </div>
        </div>
        <div class="flex justify-end">
          <button type="submit" class="px-4 py-1 rounded bg-blue-600 text-white">
            Post!
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="container mx-auto bg-white mt-4">
    @if($posts->count() > 0)
      @foreach($posts as $post)
        <div class="px-6 py-4 mb-2 border-b">
          <div class="flex items-center">
            <span class="font-semibold">{{ $post->title }}</span>
            <a 
              href="{{ route('post.show', [
                'id' => $post->id
              ]) }}" 
              class="ml-2 text-blue-400 px-2 rounded hover:bg-blue-50">
                Leer mas
            </a>
          </div>
        </div>
      @endforeach
    @else
      <p class="text-gray-600 py-4 px-4 text-center">There are no posts yet!</p>
    @endif
  </div>
@endsection