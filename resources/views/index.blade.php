@extends('layouts.app')

<div class="container">
    @foreach($posts as $post)
      <div class="card">
        <div class="card-header">{{ $post->user->name }}</div>
        <div class="card-body">{{ $post->body }}</div>
      </div>
    @endforeach
  </div>
@endsection