@php
  $routeList = [
    [
      'route-name' => 'profile.view',
      'label' => 'Datos Personales',
      'disabled' => false
    ],
    [
      'route-name' => 'profile.avatar',
      'label' => 'Avatar',
      'disabled' => false
    ],
    [
      'route-name' => null,
      'label' => 'Metricas de Posts',
      'disabled' => true
    ],
  ];

  $currentRouteName = Request::route()->getName();
@endphp

@extends('layouts.web')

@section('content')
  <div class="container mx-auto">
    <div class="flex w-full bg-white rounded">
      <div class="w-1/4 flex flex-col px-4 py-4 border-r">
        @foreach($routeList as $route)
          @if($route['disabled'] || !$route['route-name'])
            <a href="#" class="px-4 py-2 cursor-not-allowed rounded text-gray-400  transition-colors duration-150">
              {{ $route['label'] }}
            </a>
          @elseif($currentRouteName === $route['route-name'])
            <a href="{{ route($route['route-name']) }}" class="px-4 py-2 font-semibold rounded text-blue-500 hover:bg-blue-50 hover:text-blue-500 transition-colors duration-150">
              {{ $route['label'] }}
            </a> 
          @else
            <a href="{{ route($route['route-name']) }}" class="px-4 py-2 font-semibold rounded text-gray-700 hover:bg-blue-50 hover:text-blue-500 transition-colors duration-150">
              {{ $route['label'] }}
            </a>
          @endif
        @endforeach
        
      </div>
      <div class="w-3/4 flex flex-col">
        <div class="px-4 py-4">
          @yield('profile-content')
        </div>
      </div>
    </div>
  </div>
@endsection