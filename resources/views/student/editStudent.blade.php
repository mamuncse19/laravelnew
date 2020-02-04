@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	
        	<a class="btn btn-info" href="{{url('/all.student')}}">All Student</a>
        <hr>
        <br>
        <h2>Update Student</h2>

	        @if ($errors->any())
	 
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        
        <form action ="{{ url('updateStudent/'.$std->id) }}" method="post">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{$std->name}}" name="name">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="email" class="form-control" value="{{$std->email}}" name="email">
            </div>
          </div>
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="number" class="form-control" value="{{$std->phone}}" name="phone">
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