@extends('default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard

                    @if(!Auth::guest())
                    <div class="btn-group pull-right">
                        <a href="posts/create" class ="btn btn-default btn-sm">
                            <i class ="fas fa-plus"></i>New Post
                        </a>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!Auth::guest())
                        <h3> Your Posts </h3>
                        <table class="table table-striped">
                            <head>
                                <tr>
                                    <th>TiTle</th>
                                    <th>Created</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </head>
                            <tbody>
                        
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td> 
                                            <a href = "/posts/{{$post->id}} /edit" class = "btn btn-info btn-sm" >
                                                <i class = "fa fa-edit"></i> Edit Post
                                            </a>
                                        </td>

                                        <td>
                                        {!!  Form::open( [  'action' => ['PostsController@destroy' , $post->id]   , 'method'=>'POST' ])  !!}
                                        {{ Form::hidden('_method' , 'DELETE') }}
                                            <button class="btn btn-danger btn-sm" type="submit" >
                                                Delete Post
                                            </button>
                                        {!!   Form::close()  !!}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
