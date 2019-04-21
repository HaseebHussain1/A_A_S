@extends('layouts.app') 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-12 ">
<div class="card">
<div class="card-header">Display all vehicles</div>
<div class="card-body">
<table class="table table-striped "style="width:auto">
<thead>
<tr class="d-flex"> 
<th class="col-md-1">Reg_NO</th>
<th class="col-md-2">category</th>
<th class="col-md-2">Brand</th>
<th class="col-md-2">Daily_Rate</th>
<th class="col-md-2">is adopted</th>
<th class="col-md-3">Action</th>
</tr>
</thead>
<tbody>
@foreach($animals as $animal)
<tr class="d-flex"> 
<td class="col-md-1 col-sm-1">{{$animal->name}}</td>
<td class="col-md-1 col-sm-1">{{$animal['age']}}</td>
<td class="col-md-1 col-sm-1">{{$animal['type']}}</td>
<td class="col-md-1 col-sm-1" >{{$animal['description']}}</td>
@if ($animal['isadopted']===1)
<td class="col-md-1 col-sm-1">
is adopted 
</td>
@else
<td class="col-md-1 col-sm-1">
not adopted 
</td>
@endif
<td class="col-md-1 col-sm-1"><a href="{{action('AnimalController@show', $animal['id'])}}" class="btn btn- primary col-md-12 col-sm-8">Details</a></td>
<td class="col-1 col-sm-1"><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn btn- warning col-12">Edit</a></td>
<td class="col-1">
<form action="{{action('AnimalController@destroy', $animal['id'])}}" method="post"> @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger col-8" type="submit"> Delete</button>
</form>
</td>
<td class="col-1">
<form class="form-horizontal" method="POST" 
action="{{url('Adoptions') }}" > 
@csrf
<input type="submit" class="btn btn-primary" /> 
</form> 
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
