@extends('layouts.app') 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Vehicle</div>
<div class="card-body">
<table class="table table-striped" border="1" >
<tr> <td> <b>Register Number </th> <td> {{$animal['name']}}</td></tr>
<tr> <th>Vehicle type </th>
 <td>{{$animal->age}}</td></tr>
<tr> <th>Vehicle brand </th>
 <td>{{$animal->description}}</td></tr>
<tr> <td>Daily rate </th>
 <td>{{$animal->isadopted}}</td></tr>
<tr> <th>Notes </th> <td style="max-width:150px;" >{{$animal->description}}</td></tr>
<tr> <td colspan='2' ><img style="width:100%;height:100%" src="{{ asset('storage/images/'.$animal->image)}}"></td></tr> 
</table>
<table><tr>
<td><a href="{{action('AnimalController@index')}}" class="btn btn-primary" role="button">Back to the list</a></td>
<td><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn btn- warning">Edit</a></td>
<td><form action="{{action('AnimalController@destroy', $animal['id'])}}" 
method="post">
 @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger"
 type="submit">Delete</button>
</form></td>
</tr></table>
</div>
</div>
</div>
</div>
</div> 
@endsection
