@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	<a class="btn btn-danger" href="{{ URL::to('post') }}">Write Post</a>
        	<a class="btn btn-info" href="{{ url('/allCategory') }}">All category</a>
        <hr>

        <table class="table table-stript" style="text-align: center;">
          <tr>
            <th>S.L</th>
            <th>Category Nmae</th>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
          </tr>

          @foreach($post as $row)
          
          <tr>
            <td>{{$row->id}}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->title }}</td>
            <td><img src="{{ URL::to($row->image) }}" style="width: 50px; height: 50px;"></td>
            <td>
              <a href="{{ URL::to('viewPost/'.$row->id) }}" class="btn btn-success">View</a>
              <a href="{{ url('editPost/'.$row->id) }}" class="btn btn-info">Edit</a>
              <a href="{{ url('/deletePost/'.$row->id) }}" id="deleteId" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          
          @endforeach
          
        </table>

        
        
      </div>
    </div>
@endsection    