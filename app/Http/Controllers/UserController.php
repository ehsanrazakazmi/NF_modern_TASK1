<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     // this will show index page to admins only
    public function index(Request $request)
    {
        if ($request->user()->hasRole('Admin'))     // this allows to restrict the users to access this page
        {
            $data = User::orderBy('id','ASC')->paginate(5);
            return view('users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
            // Your existing logic for users.index
        } else {
            // return redirect()->back();
            return redirect()->back()->with('alert', 'Sorry you have no access');
        }
    }
// ----------------------------------------------------------------------------------------------

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */





    //opens the create page
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();         // retrieves all the values by given name key
        return view('users.create',compact('roles'));
    }
    // -----------------------------------------------------------------------------------------------------


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    // allows the admin to create new users by assigning them roles
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }
    // -----------------------------------------------------------------------------------------------





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





    //  display the detail by clicking on show button
    public function show($id): View
    {
        $user = User::find($id);
        // dd($id);
        return view('users.show',compact('user'));
    }
    // -------------------------------------------------------------------------------------------








    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    //  allows admin to edit the information about user 
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }
    
// ----------------------------------------------------------------------------------------------




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    //  will update the user info 
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }
        else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User updated successfully');
    }
    // -------------------------------------------------------------------------------------------------------




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    //  will delete the specific id mentioned data
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
// -----------------------------------------------------------------------------------------------------------------------



}
