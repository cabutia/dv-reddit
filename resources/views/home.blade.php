<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto bg-white mt-12">
    <div class="px-6 py-4">
      <h1 class="text-4xl font-bold text-center">{{ config('app.name') }}</h1>
    </div>
    <div class="w-2/3 py-4">
      <form class="w-full px-6" action="/post/create" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
          @if(Session::has('success_message'))
            <div class="bg-green-100 text-green-600 border border-green-300 px-4 py-2 rounded mb-2">
              {{ Session::get('success_message') }}
            </div>
          @endif

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
        <div class="flex justify-end">
          <button type="submit" class="px-4 py-1 rounded bg-blue-600 text-white">
            Post!
          </button>
        </div>
      </form>
    </div>
  </div>
  <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>