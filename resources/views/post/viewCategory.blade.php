@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	<a class="btn btn-danger" href="{{ route('AddCategory') }}">Add category</a>
        	<a class="btn btn-info" href="{{ url('/allCategory') }}">All category</a>
        <hr>

        <div>
        	<ol>
        		<li>Category Name: {{ $cat->name }}</li>
        		<li>Slug Name: {{ $cat->slug }}</li>
        		<li>Created At: {{ $cat->created_at }}</li>
        	</ol>
        </div>
        
      </div>
    </div>
@endsection    