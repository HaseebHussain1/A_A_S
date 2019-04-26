@extends('layouts.app') 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 ">
<div class="card">
<div class="card-header">Display all vehicles</div>
@if ($errors->any()) 
<div class="alert alert-danger"> 
dddd
 <ul> @foreach ($errors->all() as $error) 
 <li>{{ $error }}</li> @endforeach
 </ul> 
</div><br />
@endif
@if (\Session::has('error')) 
<div class="alert alert-danger"> 
<p>{{ \Session::get('error') }}</p>
</div><br /> @endif
@if (\Session::has('success')) 
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p>
</div><br /> @endif
<div class="card-body table-responsive">
<table class="table table-striped">
<thead>
<tr> 
<th scope="col" >id</th>
<th scope="col" >status</th>
<th scope="col">animal name</th>
<th scope="col">animal id</th>
<th scope="col">users name</th>
<th scope="col"  colspan="4">Action</th>
</tr>
</thead>
<tbody>
@foreach($adoptions as $adoption)
<tr scope="row"> 
<td>{{$adoption->id}}</td>
<td>{{$adoption->status}}</td>
<td>{{$adoption->animal['name']}}</td>
<td>{{$adoption->animal['id']}}</td>
<td>{{$adoption->user['name']}}</td>
<td >


<form class="form-horizontal" method="POST" action="{{ action('AdoptionController@update',$adoption['id']) }} " enctype="multipart/form-data" >
@method('PATCH')
@csrf
<input type="hidden" name="accept"/>

<input type="submit" value="Accept" class="btn btn-primary" />
</form>


</td>

<td >


<form class="form-horizontal" method="POST" action="{{ action('AdoptionController@update',$adoption['id']) }} " enctype="multipart/form-data" >
@method('PATCH')
@csrf
<input type="hidden" name="deny"/>

<input type="submit" value="Deny" class="btn btn-primary" />
</form>


</td>
</tr> 
@endforeach
</tbody>
</table>
{{$adoptions->links()}}
</div>
</div>
</div>
</div>
</div> 
@endsection
