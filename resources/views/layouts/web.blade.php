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
  <x-top-navigation-bar :user="Auth::user()" :links="[
    [
      'route' => route('home'),
      'label' => 'Home'
    ],
    [
      'route' => '#',
      'label' => 'Profile'
    ]
  ]" />

  

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