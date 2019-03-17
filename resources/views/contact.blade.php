@extends('default')
@section('content')
<h2>Contact Us</h2>
<hr />
<form action="">
    <div class ="form-group">
        <label for="name">Name</label>
        <input type="text" clas = "form-control"  name ="name" />

    </div>

    <div class ="form-group">
        <label for="email">Email</label>
        <input type="text" clas = "form-control"  name ="email" />
        
    </div>
    <div class="form-group pull-right">
        <button class = "btn btn-info"> Send </button>
        
    </div>

</form>

@endsection
