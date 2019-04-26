<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $this->middleware('auth');
        $animals = Animal::where('isadopted','=','0')->paginate(2); 
	return view('Animals.index', compact('animals')); 
    }


  public function adminindex()
    {
      //  $this->middleware('auth');
	//$user= User::all()->first()->adoptions->first()->animal;
        $animals = Animal::paginate(2);//->first()->succsesfuladoption()->first()->user;
	//return $animals;
	return view('Animals.adminindex', compact('animals')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // form validation
$Animal = $this->validate(request(), [ 
'name' => 'required', 
'age' => 'required|numeric',
'type' => 'required',
 'description' => 'required'
]); 

// create a Vehicle object and set its values from the input   
$animal = new Animal;
$animal->name = $request->input('name'); 
$animal->age = $request->input('age');
$animal->type = $request->input('type');
$animal->description = $request->input('description'); 
$animal->isadopted = 0; 
$animal->created_at = now();

// save the Vehicle object 
$animal->save();
// generate a redirect HTTP response with a success message 
return back()->with('success', 'Vehicle has been added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $animal = Animal::find($id); 
	return view('Animals.show',compact('animal')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $animal = Animal::find($id); 
	return view('Animals.edit',compact('animal')); 
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
        $animal = Animal::find($id);
$this->validate(request(), [ 
'name' => 'required', 
'age' => 'required|numeric',
'type'=>'required'
]); 
$animal->name = $request->input('name');
$animal->age = $request->input('age');
$animal->type = $request->input('type');
$animal->description = $request->input('description'); 
//$animal->isadopted = $request->input('isadopted');
$animal->updated_at = now();

$animal->save();
return redirect('users/Animals')->with('success','animal has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $animal = Animal::find($id);
	$animal->delete();
	return redirect('users/Animals')->with('success','animal has been deleted'); 
    }
}
