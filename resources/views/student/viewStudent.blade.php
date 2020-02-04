@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	
        	<a class="btn btn-info" href="{{ url('all.student') }}">All Student</a>
        <hr>

       <p>Student Name: {{ $data->name }}</p> 
       <p>Student Email: {{ $data->email }}</p> 
       
       <p>Student Phone: {{ $data->phone }}</p> 
      </div>
    </div>
@endsection 