@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	<a class="btn btn-danger" href="{{ route('AddCategory') }}">Add category</a>
        	<a class="btn btn-info" href="">All category</a>
        <hr>

	        @if ($errors->any())
	        $errors->all();
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        
        <form action ="{{ route('categoryInsert') }}" method="post">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug">
            </div>
          </div>
         
          
          <br>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
@endsection    