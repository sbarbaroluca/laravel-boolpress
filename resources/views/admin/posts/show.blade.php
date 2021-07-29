@extends('layouts.app')

@section('content')
  <div class="container">

    @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif
    
    <div class="row my-3">
      <div class="col-12">
        <h3 class="d-flex justify-content-between">
          {{ $post->title }}
          @if ($post->category) 
            <a href="{{ route('admin.categories.show', $post->$category->id) }}" class="badge badge-info text-light">
              {{ $post->category->name }}
            </a>
          @else
            <span class="badge badge-secondary">N/B</span>
          @endif
        </h3>
        @if (count($post->tags) > 0)
          @foreach ($post->tags as $tag)
              <a class="badge badge-pill badge-warning text-white" href="{{ route('admin.tags.show', $tag->id) }}">
                {{ $tag->name }}
              </a>
          @endforeach 
        @else 
          <span class="badge badge-pill badge-secondary text-light">No tags</span>
        @endif   
        <p>{{ $post->body }}</p>
      </div>  
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">
        <i class="fas fa-arrow-left"></i>
      </a>
      <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }}">
        <i class="fas fa-pencil-alt text-light"></i>
      </a>
    </div>
  </div>
@endsection   

