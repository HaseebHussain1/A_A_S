@extends('layouts.app') 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 ">
<div class="card">
<div class="card-header">Display all vehicles</div>
<div class="card-body table-responsive">
<table class="table table-striped">
<thead>
<tr> 
<th scope="col" >Reg_NO</th>
<th scope="col" >category</th>
<th scope="col">Brand</th>
<th scope="col">Daily_Rate</th>
<th scope="col">is adopted</th>
<th scope="col"  colspan="4">Action</th>
</tr>
</thead>
<tbody>
@foreach($animals as $animal)
<tr scope="row"> 
<td>{{$animal->name}}</td>
<td>{{$animal['age']}}</td>
<td>{{$animal['type']}}</td>
<td>{{$animal['description']}}</td>
@if ($animal['isadopted']===1)
<td>
is adopted 
</td>
@else
<td>
not adopted 
</td>
@endif
<td ><a href="{{action('AnimalController@show', $animal['id'])}}" class="btn btn- primary ">Details</a></td>
<td ><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn btn- warning">Edit</a></td>
<td >
<form action="{{action('AnimalController@destroy', $animal['id'])}}" method="post"> @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit"> Delete</button>
</form>
</td>
<td>
<form class="form-horizontal" method="POST" 
action="{{url('Adoptions') }}" > vvv
@csrf
<input type="hidden" name="petid" value="{{$animal['id']}}" /> 
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
