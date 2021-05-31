@extends('layouts.web')

@section('content')
  @include('pages.home._post-creation-form')
  @include('pages.home._post-list')
  <ul>
    @foreach(config('variables.colors') as $color)
      <li>{{ $color }}</li>
    @endforeach
  </ul>
@endsection