<?php

namespace App\Http\Controllers;
use auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     
    }

    public function profile(Request $request){

   
    
      return view("components.profile.index");

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
        //
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
    public function update(Request $request)
    {
     
      
        $user=User::find(auth::user()->id);

        
        if($request->pass){
            $user->password= Hash::make($request->password);
        }
        if($request->name){
            $user->name= $request->name;
        }
        if($request->email){
            $user->email= $request->email;
        }
        if($request->location){
            $user->location= $request->location;
        }
        if($request->profile_photo){


           

            if ($request->hasFile('profile_photo')) {
                //  Let's do everything here
               
                    $request->validate([
                        'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                    ]);
                
                    $imageName = time().'.'.$request->profile_photo->extension();  
                 
                    $request->profile_photo->move(public_path('assets/img/avatars'), $imageName);
                    $user->avatar= $imageName;
            }
           
        }
        $user->save();

        return back()->with('success','Profile Successfully Updated.');

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
