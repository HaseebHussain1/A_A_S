<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use auth;

use App\Adoption;
use App\User;
use Session;
use App\Animal;
class AdoptionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
	
	$this->middleware('role:staff', ['only'=>['index','alladoptions','update']]);
	$this->middleware('role:user', ['only'=>['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()// staff
    {
     	

	
	$adoptions = Adoption::where('status','=','pending')->paginate(2);
	return view('Adoptions.index', compact('adoptions'));


    }

   public function alladoptions()//staff
    {
     	

	
	$adoptions = Adoption::paginate(2);
	return view('Adoptions.alladoptions', compact('adoptions'));


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


if(Adoption::where('userid','=',Auth::user()->first()->id)->where('petid','=',$request->input('petid'))->first()===null ){
  $adoption = new Adoption;
	$adoption->userid = Auth::user()->first()->id; 
	$adoption->petid = $request->input('petid');
	$adoption->status = "pending";

	// save the Animal object 
	$adoption->save();
	return redirect('staff/Animals');

}else{
return redirect()->back()->with('error','you have already adopted ');
}
                         
	
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//staff
    {
	if($request->has('deny')){
		$adoptions = Adoption::find($id);
       
		$adoptions->status='denide';
	
		$adoptions->save();
		Session::flash('success', 'adoption denide');
		return redirect('staff/Adoptions');

}	elseif($request->has('accept')){
		$adoptions = Adoption::where('id','=',$id)->first();

		if ($adoptions->animal()->first()->isadopted==0){
			$adoptions->status='accepted';
			$adoptions->save();
			$animal=$adoptions->animal()->first();
			$animal->isadopted=1;
			$animal->save();
	
			$adoptionsd=$animal->adoptions;
			
			foreach($adoptionsd as $adoption){
				if ($adoption->id!=$adoptions->id){
	
					$adoption->status='denide';
	
					$adoption->save();
				}
	
	

			}
			Session::flash('success', 'Adoptions sucsesful');
			return redirect('staff/Adoptions');

		}
		elseif($adoptions->animal()->first()->isadopted==1){
			Session::flash('error', 'animal already adopted');
			$adoptions->status='denide';
			$adoptions->save();
			return redirect('staff/Adoptions');


		}
	}



    }

}
