@extends('default')
@section('content')
<h2>Contact Us</h2>
<hr />
{!! Form::open(['action'=> 'PagesController@dosend', 'method' => 'POST'] ) !!}
 <div class="form-group">
 {{ Form::label('name') }}
 {{ Form::text('name','', ['placeholder' => 'Enter your name' , 'class' => 'form-control']) }}
 </div>

 <div class="form-group">
 {{ Form::label('email') }}
 {{ Form::text('email','', ['placeholder' => 'Enter your Email' , 'class' => 'form-control']) }}
 </div>

 <div class="form-group">
 {{ Form::label('subject') }}
 {{ Form::text('subject','', ['placeholder' => 'Enter your subject' , 'class' => 'form-control']) }}
 </div>

 

    <div class="form-group">
     {{ Form::label('body') }}
     {{ Form::textarea('body','', ['placeholder' => '' , 'class' => 'form-control']) }}
    </div>

    <div class="form-group pull-right">
     {{ Form::submit('save' , ['class' => 'btn btn-primary']) }}
     </div>

{!! Form::close() !!}

@endsection
