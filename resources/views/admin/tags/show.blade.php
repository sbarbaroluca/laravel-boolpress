@extends('layouts.app')

@section('content')

  <div class="container">
    <h2>Tags: <span class="text-info">{{ $tag->name }}</span></h2>
    <div class="my-3">
      @forelse ($tag->posts as $post)
          <a href="{{ route('admin.posts.show', $post->id) }}">
            <h4>{{ $post->title }}</h4>
          </a>
      @empty
        <h4 class="text-warning">No posts from this tag!</h4>
      @endforelse
    </div>
    <a class="btn btn-secondary text-light" href="{{ route('admin.posts.index') }}">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
@endsection    