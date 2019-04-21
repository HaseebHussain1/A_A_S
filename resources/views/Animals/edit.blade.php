@extends('layouts.app') 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Edit and update the vehicle</div> 
@if ($errors->any()) 
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error) 
<li>{{ $error }}</li> 
@endforeach
</ul>
</div><br /> 
@endif
@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br /> 
@endif
<div class="card-bod y">
<form class="form-horizontal" method="POST" action="{{ action('AnimalController@update',$animal['id']) }} " enctype="multipart/form-data" > 
@method('PATCH')
@csrf
<div class="col-md-8">
<label >Vehicle Register Number</label>
<input type="text" name="name" value="{{$animal->name}}"/>
</div>
<div class="col-md-8">
<label>vehicle Type</label>
<select name="type" value="{{ $animal->type }}">
<option value="car">Car</option>
<option value="truck">Truck</option>
</select>
</div>
<div class="col-md-8">
<label >Daily
-rate</label>
<input type="text" name="age" value="{{$animal->age}}" />
</div>
<div class="col-md-8">
<label >Vehicle Brand</label>
<input type="text" name="brand" value="{{$animal->brand}}" />
</div>
<div class="col-md-8">
<label >Description</label>
<textarea rows="4" cols="50" name="description" > {{$animal->description}}
</textarea>
</div>
<div class="col-md-8">
<label>Image</label>
<input type="file" name="image" />
</div>
<div class="col-md-6 col-md-offset-4">
<input type="submit" class="btn btn-primary" />
<input type="reset" class="btn btn-primary" />
</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div> 
@endsection

