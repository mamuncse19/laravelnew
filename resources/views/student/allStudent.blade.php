@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
       
        	
        	<a class="btn btn-info" href="{{ route('student') }}">Add Student</a>
         <hr>

        <table class="table table-stript" style="text-align: center;">
          <tr>
            <th>S.L</th>
            <th>Student Nmae</th>
            <th>Student Email</th>
            <th>Student Phone</th>
            <th>Action</th>
          </tr>
 			@foreach($getstd as $row)
 			<tr>
 				<td>{{$row->id}}</td>
 				<td>{{$row->name}}</td>
 				<td>{{$row->email}}</td>
 				<td>{{$row->phone}}</td>
 				<td><a href="" class="btn btn-success">View</a>
 				<a href="" class="btn btn-info">Edit</a>
 				<a href="" class="btn btn-danger">Delete</a></td>
 			</tr>
 			@endforeach
        </table>
 
      </div>
    </div>
@endsection    