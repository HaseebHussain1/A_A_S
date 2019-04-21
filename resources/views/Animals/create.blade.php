<!--   inherite master template app.blade.php --> 
@extends('layouts.app')
<!--   define the content section --> 
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
<div class="col-md-10 "> 
        <div class="card"> 
   <di v class="card-header">Create an new vehicle</div> 
<!--   display the errors --> 
@if ($errors->any()) 
<div class="alert alert-danger"> 
 <ul> @foreach ($errors->all() as $error) 
 <li>{{ $error }}</li> @endforeach
 </ul> 
</div><br />
@endif
 <!-- display the success status --> 
@if (\Session::has('success')) 
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p>
</div><br /> @endif
   <!-- define the form --> 
 <div class="card-body"> 
<form class="form-horizontal" method="POST" 
action="{{url('Animals') }}"    enctype="multipart/form-data"> 
@csrf
   <div class="col-md-8"> 
    <label >Vehicle Register Number</label>
<input type="text" name="name" placeholder="Vehicle registernumber" /> 
    </div> 
  <div class="col-md-8"> 
<label>vehicle Type</label>
<select name="type" > 
 <option value="car">Car</option>
 <option value="truck">Truck</option> 
</select> 
</div> 
<div class="col-md-  8"> 
<label >Daily-rate</label> 
<input type="text" name="age" placeholder="Daily-rate" /> 
</div> 
<div class="col-md-  8"> 
<label >Description</label> 
<textarea rows="4" cols="50" name="description"> Notes about the vehicle </textarea> 
</div> 
<div class="col-md-  8"> 
<label>Image</label> 
<input type="file" name="image" placeholder="Image file" /> 
</div> 
<div class="col-md-  6 col-md-  offset-4"> 
<input type="submit" class="btn btn-primary" /> 
<input type="reset" class="btn btn-primary" /> 
</div> 
</form> 
</div> 
</div> 
</div> 
</div> 
</div> 
@endsection 
