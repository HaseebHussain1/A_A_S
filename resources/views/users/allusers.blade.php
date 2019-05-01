@extends('layouts.app') 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 ">
<div class="card">
<div class="card-header">all users</div>
<div class="card-body table-responsive">
<table class="table table-striped">
<thead>
<tr> 
<th scope="col" >id</th>
<th scope="col" >name</th>
<th scope="col">email</th>
<th scope="col">role</th>
<th scope="col"  colspan="4">Action</th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
@if($user->role!='admin')
<tr scope="row"> 
<td>{{$user->id}}</td>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->role}}</td>

@endif
@if($user->role=='staff')
<td>
<form class="form-horizontal" method="POST" action="{{ action('UserController@changeusertype',$user['id']) }} " enctype="multipart/form-data" >
@method('PATCH')
@csrf
<input type="hidden" name="changetouser"/>

<input type="submit" value="changetouser" class="btn btn-primary" />
</form>
</td>
@endif
@if($user->role=='user')
<td>
	<form class="form-horizontal" method="POST" action="{{ action('UserController@changeusertype',$user['id']) }} " enctype="multipart/form-data" >
	@method('PATCH')
	@csrf
		<input type="hidden" name="changetostaff"/>

		<input type="submit" value="To staff" class="btn btn-primary" />
</form>
</td>
@endif
</tr> 
@endforeach
</tbody>
</table>
{{$users->links()}}
</div>
</div>
</div>
</div>
</div> 
@endsection
