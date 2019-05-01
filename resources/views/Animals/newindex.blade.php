@extends('layouts.app') 
@section('content')

<div class="container">
        <h5 class="section-title h1">Available animals</h5>
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
        <div class="row">
@foreach($animals as $animal)

<!---->
            <!-- animals -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid"style="width:100%;height:100%" src="{{ asset('storage/images/'.$animal->image)}}" alt="card image"></p>
                                    <h4 class="card-title">{{$animal->name}}</h4>
					
                                    <p class="card-text">type: {{$animal['type']}}</br>
							dob: {{$animal['dob']}}
</p>
                                    <a href="{{action('AnimalController@show', $animal['id'])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>cc</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
           
            @endforeach

        </div>
	{{$animals->links()}}
    </div>



@endsection
