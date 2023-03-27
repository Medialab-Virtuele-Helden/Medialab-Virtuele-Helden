@extends('layouts.app')

@section('content')
  @foreach($posts as $post)
    <h1 class="h3">{{ $post->title }}</h1>
  @endforeach
@endsection