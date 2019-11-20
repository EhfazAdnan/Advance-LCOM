@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

      <div class="card">

        <div class="card-header">
          Manage Sliders
        </div>

        <div class="card-body">

        @include('backend.partials.messages')

            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2"><i class="fa fa-plus"></i>Add Slider</a>
            <div class="clearfix"></div>    

            <!--Create Modal -->
                      <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Add new slider</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                  <div class="form-group">
                                  <label for="title">Slider Title</label>
                                  <input type="text" class="form-control" name="title" id="title" placeholder="set slider title">
                                  </div>

                                  <div class="form-group">
                                  <label for="image">Slider Image</label>
                                  <input type="file" class="form-control" name="image" id="image">
                                  </div>

                                  <div class="form-group">
                                  <label for="button_text">Slider Button text</label>
                                  <input type="text" class="form-control" name="button_text" id="button_text" placeholder="set button_text">
                                  </div>

                                  <div class="form-group">
                                  <label for="button_link">Slider Button link</label>
                                  <input type="text" class="form-control" name="button_link" id="button_link" placeholder="set button_link">
                                  </div>

                                  <div class="form-group">
                                  <label for="priority">Slider Priority</label>
                                  <input type="number" class="form-control" name="priority" id="priority" value="10">
                                  </div>                                  
                                  
                                  <button type="submit" class="btn btn-success">Add New</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </form>
                            </div>
                            
                          </div>
                        </div>
                      </div>    

            <table class="table table-hover table-striped">
                <tr>
                   <th>#</th>
                   <th>Slider Title</th>
                   <th>Slider Image</th>
                   <th>Priority</th>
                   <th>Action</th>
                </tr>

                @foreach($sliders as $slider)
                <tr>
                   <td>{{ $loop->index+1 }}</td>
                   <td>{{ $slider->title }}</td>
                   <td><img src="{{ asset('images/sliders/'.$slider->image) }}" alt="" width="75"></td>
                   <td>{{ $slider->priority }}</td>
                   <td>
                      <a href="#editModal{{$slider->id}}" data-toggle="modal" class="btn btn-primary">Edit</a>
                      <a href="#deleteModal{{$slider->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                      <!--Delete Modal -->
                      <div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete??</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.slider.delete', $slider->id ) }}" method="post">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger">Permanent Delete</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                        <!--Edit Modal -->
                        <div class="modal fade" id="editModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit slider</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                  <div class="form-group">
                                  <label for="title">Slider Title</label>
                                  <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title }}">
                                  </div>

                                  <div class="form-group">
                                  <label for="image">Slider Image</label>
                                  <a href="{{ asset('images/sliders/'.$slider->image) }}" target="_blank">Previous Image</a>
                                  <input type="file" class="form-control" name="image" id="image">
                                  </div>

                                  <div class="form-group">
                                  <label for="button_text">Slider Button text</label>
                                  <input type="text" class="form-control" name="button_text" id="button_text" value="{{ $slider->button_text }}">
                                  </div>

                                  <div class="form-group">
                                  <label for="button_link">Slider Button link</label>
                                  <input type="text" class="form-control" name="button_link" id="button_link" value="{{ $slider->button_link }}">
                                  </div>

                                  <div class="form-group">
                                  <label for="priority">Slider Priority</label>
                                  <input type="number" class="form-control" name="priority" id="priority" value="{{ $slider->priority }}">
                                  </div>                                  
                                  
                                  <button type="submit" class="btn btn-success">Update</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </form>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                   </td>
                </tr>
                @endforeach

            </table>

        </div>
      </div>

    </div>
</div>
@endsection