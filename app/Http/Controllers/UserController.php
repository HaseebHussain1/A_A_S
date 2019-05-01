<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\User;
class UserController extends Controller
{

   public function __construct()
    {
        //$this->middleware('auth');
	
	
	$this->middleware('role:admin');
    }

    /**
     * displays all users
     *
     * @return view users.allusers with the users
     */
    public function showallusers(){


$users = User::paginate(5);
return view('users.allusers',compact('users'));
}


    /**
     * changes the type of user
     *
     * @return a route link to admi/allusers
     */
public function changeusertype(Request $request, $id)
{ 
	if ($request->has('changetostaff')){

		$user = User::find($id);
       
		$user->role='staff';
	
		$user->save();
		Session::flash('success', 'user.$user->name changed to staff');
		return redirect('admin/allusers');
		
	}else if($request->has('changetouser'))
	{

		$user = User::find($id);
       
		$user->role='user';
	
		$user->save();
		Session::flash('success', 'user.$user->name changed to staff');
		return redirect('admin/allusers');
}

}
}
