@extends('default')

@section('content')

<h1> Add Post </h1>
<br />
{!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST' , 'files' =>true] ) !!}
 <div class="form-group">
 {{ Form::label('Title') }}
 {{ Form::text('title','', ['placeholder' => 'Enter Post Title' , 'class' => 'form-control']) }}
 </div>

    <div class="form-group">
     {{ Form::label('body') }}
     {{ Form::textarea('body','', ['placeholder' => 'Enter Post Title' , 'class' => 'form-control ckeditor']) }}
    </div>

    <div class="form-group pull-right">
     {{ Form::submit('save' , ['class' => 'btn btn-primary']) }}
     </div>

     <div class="form-group">
     {{ Form::label('Featured Image') }}
     {{ Form::file('photo', ['placeholder' => 'Select Featured Image' , 'class' => 'form-control']) }}
    </div>

{!! Form::close() !!}

@endsection