@extends('default')

@section('content')
    <h1> {{$post->title }} </h1>
    @if(!Auth::guest() && (Auth::user()->id) == $post->user_id)
        <div class = "clearfix"> 
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
        </div>
    @endif
    <hr />

    <div>
    <img src="{{ asset('images/posts/'.$post->photo) }}" class = "img-responsive" />
        {!! $post->body !!}
    </div>

    <hr />
    <h4>Comments : {{  $post->comments->count() }} </h4>

    <ul class="comments">
        @foreach($post->comments as $comment)
        <li class="comments">
            <div class="clearfix">
                <h4 class="pull-left">
                    {{ $comment->user->name }}
                </h4>
                <p class="pull-right">
                    {{ $comment->created_at->format('d M Y') }}
                </p>
            </div>
            <p> {{   $comment->body   }}  </p>
        
        </li>
        @endforeach
    </ul>

    <div class="panel panel-default">
        <div class="panel-heading">
            Add Your Comment
        </div>
        @guest
        @else
        <div class="panel-body">
            <form action=" {{ route('comments.store',$post->slug)  }} " method = "POST" >
                {{    csrf_field()  }}
                <div class="form-group">
                    <label for="Comment">Comment</label>
                    <textarea name="body" id="form-control" placeholder = "Enter your comment" cols="150" rows="10"></textarea>

                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
                        Add comment
                    </button>
                </div>
            </form>
        </div>
        @endguest
    </div>
@endsection