<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\User;

class AnimalController extends Controller
{

    public function __construct()
    {
        
	
	$this->middleware('role:staff', ['except'=>['index','show']]);
	$this->middleware('role:user', ['only'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $animals = Animal::where('isadopted','=','0')->paginate(5); 
	return view('Animals.newindex', compact('animals')); 
    }


  public function staffindex()
    {
        $animals = Animal::paginate(5);
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
	'dob' => 'required|date',
	'type'=>'required',
	'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
	'description'=>'required'
]); 

// create a animal object and set its values from the input   
	$animal = new Animal;
	$animal->name = $request->input('name'); 
	$animal->age = $request->input('age');
	$animal->type = $request->input('type');
	$animal->description = $request->input('description'); 
	$animal->isadopted = 0; 
	$animal->created_at = now();
	$animal->age=5;//dxdd
	if ($request->hasFile('image')){
		//Gets the filename with the extension
		$fileNameWithExt = $request->file('image')->getClientOriginalName();
		//just gets the filename
		$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
		//Just gets the extension
		$extension = $request->file('image')->getClientOriginalExtension();
		//Gets the filename to store
		$fileNameToStore = $filename.'_'.time().'.'.$extension;
		//Uploads the image
		$path = $request->file('image')->storeAs('public/images', $fileNameToStore); 
	} else {
		$fileNameToStore = 'noimage.jpg';
	}
		$animal->image = $fileNameToStore;
	// save the animal object 
		$animal->save();
	// generate a redirect HTTP response with a success message 
	return back()->with('success', 'animal has been added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $animal = Animal::where('id','=',$id)->first(); 
	
	if($animal->isadopted==1){
	Session::flash('error', 'you are trying to view an already adopted ');
	return redirect('users/Animals');
		

}
	return view('Animals.show',compact('animal')); 
    }


    public function staffshow($id)
    {
         $animal = Animal::find($id); 
	return view('Animals.staffshow',compact('animal')); 
    }
    public function showuseradoptions($id)
    {
         $user = User::find($id); 
	$adoptions=$user->first()->adoptions()->paginate(2);
	
	return view('Adoptions.adoptions',compact('adoptions')); 
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
		'dob' => 'required|date',
		'type'=>'required',
		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
		'description'=>'required'
]); 
	$animal->name = $request->input('name');
	$animal->dob = $request->input('dob');
	$animal->type = $request->input('type');
	$animal->description = $request->input('description'); 
	$animal->age = 5;//
	$animal->updated_at = now();

//Handles the uploading of the image 
	if ($request->hasFile('image')){
//Gets the filename with the extension
	$fileNameWithExt = $request->file('image')->getClientOriginalName();
//just gets the filename
	$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//Just gets the extension
	$extension = $request->file('image')->getClientOriginalExtension();
//Gets the filename to store
	$fileNameToStore = $filename.'_'.time().'.'.$extension;
//Uploads the image
	$path = $request->file('image')->storeAs('public/images', $fileNameToStore); 
} else {
	$fileNameToStore = $animal->image;
}
$animal->image = $fileNameToStore;


	$animal->save();
	return redirect('staff/Animals')->with('success','animal has been updated');

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
