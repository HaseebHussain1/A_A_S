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
<th scope="col">owner</th>

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
<td>
{{$animal->succsesfuladoption()->first()->user['name']}}
</td>
@else
<td>
not adopted 
</td>
@endif

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
