@extends('layouts.web')

@section('content')
<div class="container mx-auto w-1/2">
  <form action="{{ route('auth.login') }}" method="post" class="bg-white rounded px-4 py-4">
    <div class="flex flex-col">
      @csrf
      <div class="flex flex-col mb-4">
        <input class="border rounded px-4 py-2" type="text" value="{{ old('username') }}" name="username" placeholder="Enter your username">
        @if($errors->has('username'))
          <span class="text-sm text-red-500 mt-1">{{ $errors->first('username') }}</span>
        @endif
      </div>
      <div class="flex flex-col mb-4">
        <input class="border rounded px-4 py-2" type="password" name="password" placeholder="Enter your password">
        @if($errors->has('password'))
          <span class="text-sm text-red-500 mt-1">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="flex justify-end mb-2 mt-4">
        <button class="bg-blue-500 text-white font-semibold px-4 py-2 rounded" type="submit">Iniciar sesion</button>
      </div>
    </div>
  </form>
</div>
@endsection