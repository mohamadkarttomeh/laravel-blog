@extends('default')

@section('content')
    <h1> {{$post->title }} </h1>

         <a href = "/posts/{{$post->id}} /edit" class = "btn btn-default" > 
             
             <i class = "fa fa-edit"></i> Edit Post
         </a>
        <div class="pull-right">

        {!!  Form::open( [  'action' => ['PostsController@destroy' , $post->id]   , 'method'=>'POST' ])  !!}
             {{ Form::hidden('_method' , 'DELETE') }}
                 <button class="btn btn-danger" type="submit" >
                     Delete Post
                 </button>
       {!!    Form::close()    !!}
        </div>

    <hr />

    <div>
        {!! $post->body !!}
    </div>
@endsection