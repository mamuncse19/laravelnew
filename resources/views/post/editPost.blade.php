@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	<a class="btn btn-danger" href="{{ route('AddCategory') }}">Add category</a>
        	<a class="btn btn-info" href="{{ url('/allCategory') }}">All category</a>
          <a class="btn btn-info" href=" {{ route('allPost') }} ">All Post</a>
        <hr>

        @if ($errors->any())
          
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
        <form action="{{ url('postUpdate/'.$post->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title">
            </div>
          </div>
          <div class="control-group">
              <label>Select Category</label>
              <select class="form-control" name="catId">
              	@foreach($cat as $category)
                <option value="{{ $category->id }}" <?php if($post->category_id==$category->id) echo "selected"; ?>>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>New Image</label>
              <input type="file" class="form-control" name="catImage">
              <img src="{{url($post->image)}}" style="height: 100px; width: 80px;">
              <input type="hidden" name="oldImage" value="{{$post->image}}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" name="details">{{$post->details}}</textarea>
              
            </div>
          </div>
          <br>
         
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
@endsection    