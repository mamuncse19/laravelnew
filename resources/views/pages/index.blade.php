@extends('welcome')

@section('content')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          @foreach($post as $row)
          <a href="{{URL::to('viewPost/'.$row->id)}}">
            <h2>
            <img src="{{url($row->image)}}" style="width: 500px; height: 250px;">
          </h2>
            <h3 class="post-subtitle">
              {{$row->title}}
            </h3>
          </a>
          <p class="post-meta">Category: {{$row->name}} And Slug: {{$row->slug}}</p>
          <hr>
        @endforeach
        </div>
        
        
        <!-- Pager -->
        <div class="clearfix float-right">
          {{-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> --}}
          {{$post->links()}}
        </div>
      </div>
    </div>
@endsection    