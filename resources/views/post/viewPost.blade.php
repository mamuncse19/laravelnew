@extends('welcome')

@section('content')
 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        	<a class="btn btn-danger" href="{{ URL::to('post') }}">Write Post</a>
        	<a class="btn btn-info" href="{{ route('allPost') }}">All Post</a>
        <hr>

       <p>Ttile: {{ $post->title }}</p> 
       <p>CategoryName: {{ $post->name }}</p> 
       <img src="{{ URL::to($post->image) }}" style="width: 200px; height: 200px;"> 
       <p>Details:{{ $post->details }}</p> 
      </div>
    </div>
@endsection    