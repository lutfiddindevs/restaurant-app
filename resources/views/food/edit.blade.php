@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(Session::has('message'))
              <div class="alert alert-success">
                  {{ Session::get('message') }}
              </div>
          @endif
          <form action="{{ route('food.update', [$food->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">Edit Food</div>

                <div class="card-body">
                   <div class="form-group">
                       <label for="name">Name</label>
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $food->name }}">
                       @error('name')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="description">Description</label>
                       <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $food->description }}</textarea>
                       @error('description')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="price">Price</label>
                       <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $food->price }}">
                       @error('price')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="category">Category</label>
                       <select name="category" class="form-control  @error('category') is-invalid @enderror" value="">
                         @foreach(App\Models\Category::all() as $category)
                         <option value="">Select Category</option>
                          <option value="{{ $category->id }}" @if($category->id == $food->category_id) selected @endif >{{ $category->name }}</option>
                         @endforeach
                       </select>
                       @error('category')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="image">Image</label>
                       <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                       @error('image')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-outline-primary">Upload</button>
                   </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
