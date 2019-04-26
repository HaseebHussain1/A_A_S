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
        $this->middleware('auth');
	
	$this->middleware('role:admin,staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
     	

	
	$adoptions = Adoption::where('status','=','pending')->paginate(2);
	//Session::flash('success', 'Email was sent');
	return view('Adoptions.index', compact('adoptions'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


                           $adoption = new Adoption;
	$adoption->userid = Auth::user()->first()->id; 
	$adoption->petid = $request->input('petid');
	$adoption->status = "pending";

	// save the Vehicle object 
	$adoption->save();
	return redirect('Animals');
	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	if($request->has('deny')){
		$adoptions = Adoption::find($id);
       
		$adoptions->status='denide';
	
		$adoptions->save();
		Session::flash('success', 'adoption denide');
		return redirect('Adoptions');

}	elseif($request->has('accept')){
		$adoptions = Adoption::where('id','=',$id)->first();

		if ($adoptions->animal()->first()->isadopted==0){
			$adoptions->status='accepted';
			$adoptions->save();
			$animal=$adoptions->animal()->first();
			$animal->isadopted=1;
			$animal->save();
	
			$adoptionsd=$animal->adoptions;
			$a='';
			foreach($adoptionsd as $adoption){
				if ($adoption->id!=$adoptions->id){
	
					$adoption->status='denide';
	
					$adoption->save();
				}
	
	

			}
			Session::flash('success', 'Email was sent');
			return redirect('Adoptions');

		}
		elseif($adoptions->animal()->first()->isadopted==1){
			Session::flash('error', 'animal already adopted');
			$adoptions->status='denide';
			$adoptions->save();
			return redirect('Adoptions');


		}
	}



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
