@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	<a class="btn btn-danger" href="{{ route('AddCategory') }}">Add category</a>
        	<a class="btn btn-info" href="{{ url('/allCategory') }}">All category</a>
        <hr>

        <table class="table table-stript">
          <tr>
            <th>S.L</th>
            <th>Category Nmae</th>
            <th>Slug Name</th>
            <th>Action</th>
          </tr>

          @foreach($allCategory as $row)
          
          <tr>
            <td>{{$row->id}}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->slug }}</td>
            <td>
              <a href="" class="btn btn-success">View</a>
              <a href="" class="btn btn-info">Edit</a>
              <a href="" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          
          @endforeach
          
        </table>
        
      </div>
    </div>
@endsection    