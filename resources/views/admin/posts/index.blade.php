@extends('layouts.app')

@section('content')
    <div class="container">

      @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      @endif
      
      <div class="posts-header d-flex justify-content-between align-items-center my-3">
          <h2>Posts Index</h2>
          <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">
            <i class="fas fa-plus"></i>
          </a>
      </div>
      <table class="table table-striperd table-dark">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th> 
            <th>Slug</th> 
            <th colspan="3">Actions</th>
          </tr>
        </thead>  
        <tbody>
          @foreach ($posts as $post)    
          <tr>
            <td>{{ $post->id }}</td> 
            <td>{{ $post->title }}</td> 
            <td>
              @if ($post->category)
                  {{ $post->category->name }}
              @endif
            </td>      
            <td>{{ $post->slug }}</td> 
            <td>
            <a class="btn btn-primary text-dark" href="{{ route('admin.posts.show', $post->id) }}">
              <i class="fas fa-search text-light"></i>
            </a>
          </td>
          <td>
            <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }}">
              <i class="fas fa-pencil-alt text-light"></i>   
            </a>
          </td>
          <td>
            <from action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $post->title }}?')">
              
              @csrf
              @method('DELETE')

              <button class="btn btn-danger text-dark" type="submit">
                <i class="fas fa-trash-alt text-light"></i>
              </button>
            </from>
          </td> 
        </tr>    
      @endforeach
    </tbody>
  </table> 
  <div>{{ $posts->links() }}</div>
</div> 
@endsection

