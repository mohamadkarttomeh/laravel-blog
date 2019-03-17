@extends('default')

@section('content')

<h1> Edit Post </h1>
<br />
{!! Form::open(['action'=> ['PostsController@update' , $post->id ] ,'method' => 'POST']) !!}
 {{   Form::hidden('_method' , 'PUT')   }}
 
 <div class="form-group">
 {{ Form::label('Title') }}
 {{ Form::text('title',$post->title, ['placeholder' => 'Enter Post Title' , 'class' => 'form-control']) }}
 </div>

    <div class="form-group">
     {{ Form::label('body') }}
     {{ Form::textarea('body',$post->body, ['placeholder' => 'Enter Post Title' , 'class' => 'form-control ckeditor']) }}
    </div>

    <div class="form-group pull-right">
     {{ Form::submit('save' , ['class' => 'btn btn-primary']) }}
     </div>

{!! Form::close() !!}

@endsection