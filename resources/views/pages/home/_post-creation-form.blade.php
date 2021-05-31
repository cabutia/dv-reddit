<div class="container mx-auto bg-white">
  @auth
    <div class="flex">
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
      <div class="w-1/3 py-4">
        <ul>
          <li>
            <strong>Permisos del usuario</strong>
          </li>
          <li>
            <span>{{ Auth::user()->can('view post details') ? '✅' : '❌' }}</span>
            <span>Puede ver posts</span>
          </li>
          <li>
            <span>{{ Auth::user()->can('create posts') ? '✅' : '❌' }}</span>
            <span>Puede crear posts</span>
          </li>
          <li>
            <span>{{ Auth::user()->can('delete posts') ? '✅' : '❌' }}</span>
            <span>Puede eliminar posts</span>
          </li>
        </ul>
        <ul class="mt-2">
          <li>
            <strong>Roles del usuario</strong>
          </li>
          @foreach(Auth::user()->roles as $role)
            <li>
              <span>{{ $role->name }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  @else
    <div class="flex flex-col items-center justify-center py-6">
      <p class="text-gray-400 text-xl font-semibold mb-2">Necesitas estar autenticado para crear un post.</p>
      <a href="{{ route('auth.loginForm') }}" class="px-2 py-1 rounded bg-blue-500 text-white font-semibold">Iniciar Sesion</a>
    </div>
  @endauth
</div>