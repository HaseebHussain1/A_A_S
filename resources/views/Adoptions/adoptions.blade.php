@extends('layouts.app') 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 ">
<div class="card">
<div class="card-header">All my adoptions</div>
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
<th scope="col" >image</th>
<th scope="col" >status</th>
<th scope="col">animal name</th>
<th scope="col">users name</th>
</tr>
</thead>
<tbody>
@foreach($adoptions as $adoption)
<tr scope="row"> 
<td>{{$adoption->id}}</td>
<td><div style="min-width:200px;max-width:300px"><img class=" img-fluid"style="" src="{{ asset('storage/images/'.$adoption->animal['image'])}}" alt="card image"></div></td>
<td>{{$adoption->status}}</td>
<td>{{$adoption->animal['name']}}</td>
<td>{{$adoption->user['name']}}</td>


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
