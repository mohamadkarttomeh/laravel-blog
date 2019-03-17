@extends('default')

@section('content')
    @foreach($posts as $post)
        <div class="class panel">
            <div class="class panel-heading">
              <h3>
                <a href="/posts/{{$post->slug}} " >
                  {{ $post->title }}
                </a>
              </h3>
            </div>

            <div class="class panel-body">
              {{   str_limit(strip_tags($post->body)  , 50) }}
              
            </div>

            <div class = "panel-footer">
              <span class ="label label-info">
                <i class ="fas fa-calendar"></i> {{  $post->created_at }}

              </span>
              &nbsp
              <span class ="label label-info">
                <i class ="fas fa-user"></i> {{  $post->user->name }}

              </span>
            </div>

        </div>
    @endforeach
    {{ $posts->links() }}
@endsection