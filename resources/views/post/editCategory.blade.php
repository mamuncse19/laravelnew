@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	<a class="btn btn-danger" href="{{ route('AddCategory') }}">Add category</a>
        	<a class="btn btn-info" href="{{ url('/allCategory') }}">All category</a>
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
        
        <form action ="{{ url('updateCategory/'.$cat->id) }}" method="post">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" value="{{ $cat->name }}" name="name">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" value="{{ $cat->slug }}" name="slug">
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