@extends('layouts.app')

@section('content')
    <div class="container">
      <h2 class="my-3">Add a new post!</h2>
      <from action="{{ route('admin.posts.store') }}" method="POST" class="mt-3">
        @csrf
        @method('POST')
        <div class="mb-3">
          <label for="title">Title</label>
          <input type="text" class="from-control @error('title') is-invalid @enderror @error('slug') is-invalid @enderror" id="title" placeholder="Add the title of your post..." name="title" value="{{ old('title') }}">

          @error('title')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          @error('slug')
            <small class="text-danger">{{ $message }}</small>
          @enderror 

        </div>
        <div>
          <label for="body">Body</label>
          <textarea class="from-control @error('body') is-invalid @enderror" id="body" name="body" placeholder="Add the body of your post..." rows="4">{{ old('description')}}</textarea>

          @error('body')
            <small class="text-danger">{{ $message }}</small>
          @enderror 

        </div>
        <div>
          <label for="category_id">Category</label>
          <select class="from-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
              <option
                  value="{{ $category->id }}"
                  {{ ($category->id == old('category_id')) ? 'selected' : '' }}>
                  {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>     
        <div class="d-flex justify-content-between align-items-center">
          <a class="btn btn-secondary text-light" href="{{ route('admin.posts.index') }}">
            <i class="fas fa-arrow-left"></i>
          </a>
        <button type="submit" class="btn btn-primary my-5">
          <i class="fas fa-check"></i>
        </button>
      </div>
    </from>
  </div>
@endsection

          
          
        