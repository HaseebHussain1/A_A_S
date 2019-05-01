@extends('layouts.app') 
@section('content')


<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 ">
<div class="card">
<div class="card-header">Display all animals</div>
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
<th scope="col" >name</th>
<th scope="col" >age</th>
<th scope="col">type</th>
<th scope="col">is adopted</th>
<th scope="col">owner</th>
<th scope="col" col="2"> actions</th>

</tr>
</thead>
<tbody>
@foreach($animals as $animal)
<tr scope="row"> 
<td>{{$animal->name}}</td>
<td>{{$animal['age']}}</td>
<td>{{$animal['type']}}</td>
@if ($animal['isadopted']===1)
<td>
is adopted 

 
</td>
<td>
{{$animal->succsesfuladoption()->first()->user['name']}}
</td>
@else
<td>
not adopted 
</td>
<td>
 
</td>
@endif
<td ><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn btn- warning">Edit</a>
  <a href="{{action('AnimalController@staffshow', $animal['id'])}}" class="btn btn- warning">show</a>
</td>
</tr> 
@endforeach
</tbody>
</table>
{{$animals->links()}}
</div>
</div>
</div>
</div>
</div> 
@endsection
