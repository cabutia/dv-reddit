@extends('layouts.web')

@section('content')
  <div class="container mx-auto bg-white">
    {{-- @auth --}}
    <div class="w-2/3 py-4">
        <form class="w-full px-6" action="{{ route('post.create') }}" method="POST">
          @csrf
          <div class="flex flex-col mb-4">
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
      {{-- @else
        <div class="flex flex-col items-center justify-center py-6">
          <p class="text-gray-400 text-xl font-semibold mb-2">Necesitas estar autenticado para crear un post.</p>
          <a href="{{ route('auth.loginForm') }}" class="px-2 py-1 rounded bg-blue-500 text-white font-semibold">Iniciar Sesion</a>
        </div>
      @endauth --}}
  </div>

  <div class="container mx-auto mt-4">
    @if($posts->count() > 0)
      <div class="flex flex-row flex-wrap ">
        @foreach($posts as $post)
        <div class="bg-white rounded px-6 py-4 mb-2 border-b w-1/4">
          <div class="flex items-center justify-between">
            <span class="font-semibold">{{ $post->title }}</span>
            <a 
              href="{{ route('post.show', [
                'id' => $post->id
              ]) }}" 
              class="ml-2 text-blue-400 px-2 rounded hover:bg-blue-50">
                Leer mas
            </a>
          </div>
          <div class="flex flex-col mt-2">
            <span class="text-gray-400 mb-2">{{ $post->created_at }}</span>
            <span class="text-gray-400">
              Creado por:
              {{ !$post->user ? 'Anonimo' : $post->user->username }}
            </span>
          </div>
        </div>
      @endforeach
      </div>
    @else
      <p class="text-gray-600 py-4 px-4 text-center">Aun no hay posts!</p>
    @endif
  </div>
@endsection