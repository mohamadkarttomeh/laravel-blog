<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     

    <title> {{config('app.name') }} </title>
    <link rel="stylesheet" href= "{{ asset('css/extra.css') }}" >
    <link rel="stylesheet" href= "{{ asset('css/app.css') }}" >

    <script src="//cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>

    <script src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
    
</head>
<body>

    @include('navbar')
    <div class = "container">
    @include('elements.flash')
    
    @yield('content')
         
    </div>
    
    <script src = "{{ asset('js/app.js')}}"></script>
</body>

</html>