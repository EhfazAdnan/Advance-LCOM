@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Categories
        </div>
        <div class="card-body">

            <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}

            @include('backend.partials.messages')

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
            </div>

            <div class="form-group">
              <label>Description</label> 
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
            </div>

            <div class="form-group">
               <label>Parent Category</label>
               <select name="parent_id" class="form-control">
                  @foreach($main_categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>
            </div>

            <div class="form-group">
              <label for="image">Category Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>

          </form>   

        </div>
      </div>

    </div>
</div>
@endsection