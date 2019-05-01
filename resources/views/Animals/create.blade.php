<!--   inherite master template app.blade.php --> 
@extends('layouts.app')
<!--   define the content section --> 
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
<div class="col-md-10 "> 
        <div class="card"> 
   <di v class="card-header">Add animal</div> 
<!--   display the errors --> 
@if ($errors->any()) 
<div class="alert alert-danger col-12"> 
 <ul> @foreach ($errors->all() as $error) 
 <li>{{ $error }}</li> @endforeach
 </ul> 
</div><br />
@endif
@if (\Session::has('error')) 
<div class="alert alert-danger col-12"> 
<p>{{ \Session::get('error') }}</p>
</div><br /> @endif
@if (\Session::has('success')) 
<div class="alert alert-success col-12"> 
<p>{{ \Session::get('success') }}</p>
</div><br /> @endif
   <!-- define the form --> 
 <div class="card-body"> 
<form class="form-horizontal" method="POST" 
action="{{url('staff/Animals') }}"    enctype="multipart/form-data"> 
@csrf
   <div class="col-md-8"> 
    <label >pet name</label>
<input type="text" name="name" placeholder="name" /> 
    </div> 
  <div class="col-md-8"> 
<label>animal type</label>
<select name="type" > 
 <option value="cat">Cat</option>
 <option value="dog">Dog</option> 
<option value="bear">Bear</option> 
<option value="lion">Lion</option> 
<option value="mouse">Mouse</option> 
<option value="snake">snake</option> 
</select> 
</div> 
<div class="col-md-  8"> 
<label >Date of birth</label> 
<input type="date" name="dob" /> 
</div> 
<div class="col-md-  8"> 
<label >Description</label> 
<textarea rows="4" cols="50" name="description"> Animal details </textarea> 
</div> 
<div class="col-md-  8"> 
<label>Image</label> 
<input type="file" name="image" placeholder="Image file" /> 
</div> 
<div class="col-md-  6 col-md-  offset-4"> 
<input type="submit" value="add animal" class="btn btn-primary" /> 
<input type="reset" class="btn btn-primary" /> 
</div> 
</form> 
</div> 
</div> 
</div> 
</div> 
</div> 
@endsection 
