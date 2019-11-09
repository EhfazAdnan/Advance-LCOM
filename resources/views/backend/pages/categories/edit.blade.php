@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit Category
        </div>
        <div class="card-body">

        <form action="{{ route('admin.category.update', $category->id ) }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}

            @include('backend.partials.messages')

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
            </div>

            <div class="form-group">
              <label>Description</label> 
              <textarea name="description" rows="8" cols="80" class="form-control">{{ $category->description }}</textarea>
            </div>

            <div class="form-group">
               <label>Parent Category (Optional)</label>
               <select name="parent_id" class="form-control">
                  <option value="">Please select a primary category</option>
                  @foreach($main_categories as $cat)
                     <option value="{{ $cat->id }}" {{$cat->id == $category->parent_id ? 'selected' : ''}}>{{ $cat->name }}</option>
                  @endforeach
               </select>
            </div>

            <div class="form-group">
              <label for="oldimage">Category Old Image</label> <br>
                <img src="{{ asset('images/categories/'.$category->image) }}" alt="" width="100"> <br>
              <label class="mt-2" for="image">Category New Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <button type="submit" class="btn btn-success">Update Category</button>

        </form>

        </div>
      </div>

    </div>
</div>
@endsection