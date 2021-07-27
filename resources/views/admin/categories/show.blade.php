@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Category: <span class="text-info">{{ $category->name }}</span></h2>
    <div class="my-3">
      @forelse ($category->posts as $post)
          <a href="{{ route('admin.posts.show', $post->id) }}">
            <h4>{{ $post->title }}</h4>
          </a>
      @empty
        <h4 class="text-warning">No posts from this category!</h4>
      @endforelse
    </div>
    <a class="btn btn-secondary text-light" href="{{ route('admin.posts.index') }}">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
@endsection     