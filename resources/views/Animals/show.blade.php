@extends('layouts.app') 
@section('content')

<div class="container">
        <h5 class="section-title h1">{{$animal->name}}</h5>
        <div class="row">

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
<!---->
            <!-- animal -->
            <div class="col-12">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
				<div class="row justify-content-center">
                                    <p  class="col-6"><img style="width:100%;height:100%" src="{{ asset('storage/images/'.$animal->image)}}" alt="card image"></p>
					</div>
                                    
					
                                    <p class="card-text">type: {{$animal['type']}}</br>
							dob: {{$animal['dob']}}
				</br> {{$animal->description}}
</p>
                                    <a href="{{action('AnimalController@index')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> back to list</a>

<form class="form-horizontal" method="POST" 
action="{{url('staff/Adoptions') }}" > vvv
@csrf
<input type="hidden" name="petid" value="{{$animal['id']}}" /> 
<input type="submit" value="adopt" class="btn btn-primary" /> 
</form> 

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
           
           

        </div>
	
    </div>



@endsection





