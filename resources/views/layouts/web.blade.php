<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="bg-gray-100 pt-24">
  <nav class="flex w-full items-center bg-gray-200 fixed top-0 left-0 h-24 border-b">
    <div class="container mx-auto">
      <div class="flex justify-between">
        <div class="flex items-center">
          <a class="px-4" href="{{ route('home') }}">Home</a>
          <a class="px-4" href="#">Posts</a>
          <a class="px-4" href="#">Profile</a>
        </div>

        <div class="flex items-center">
          @auth
            <div class="px-4">
              <span>Usuario: </span>
              <span class="font-bold">{{ Auth::user()->username }}</span>
            </div>
            <form action="{{ route('auth.logout') }}" method="post" class="px-4">
              @csrf
              <button type="submit" class="bg-red-300 text-red-700 px-2 py-1 rounded hover:bg-red-400">
                Logout
              </button>
            </form>
          @else
            <a class="px-4" href="{{ route('auth.loginForm') }}">
              Login
            </a>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  <div class="px-6 py-4">
    <h1 class="text-4xl font-bold text-center">{{ config('app.name') }}</h1>
  </div>
  
  @if(Session::has('error_message'))
    <div class="container mx-auto mb-4">
      <div class="bg-red-300 border border-red-400 px-4 py-2 inline-block rounded">
        <span class="text-red-800 mr-2">⚠️</span>
        <span class="text-red-800">{{ Session::get('error_message') }}</span>
      </div>
    </div>
  @endif

  @if(Session::has('success_message'))
    <div class="container mx-auto mb-4">
      <div class="bg-green-300 border border-green-400 px-4 py-2 inline-block rounded">
        <span class="text-green-800 mr-2">👌</span>
        <span class="text-green-800">{{ Session::get('success_message') }}</span>
      </div>
    </div>
  @endif

  @yield('content')

  @yield('footer')
  
  <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>