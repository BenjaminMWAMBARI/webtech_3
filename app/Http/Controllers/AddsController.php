<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
use App\Models\User;
use App\Models\adds;
use App\Models\fav_adds;
use App\Models\category;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class AddsController extends Controller
{
    //

    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index(){


        $favourite=fav_adds::where('fav_adds.user_id',auth::user()->id)
        ->leftjoin('adds','adds.id','fav_adds.add_id')
        ->leftjoin('category','category.id','adds.cat_id')
        ->leftjoin("users","users.id","adds.user_id")
        ->select("fav_adds.id as fid","adds.*","category.name as cat_name","users.id as uid","users.name as uname")
        ->orderBy('adds.id', 'desc')
        ->simplePaginate(5);
        // ->get();

        $myadds=adds::where("user_id",auth::user()->id)
        ->leftjoin('category','category.id','adds.cat_id')
        ->select("adds.*","category.name as cat_name")
        ->orderBy('adds.id', 'desc')
        // ->take(3)
        ->simplePaginate(5);
        // ->get();

        $category=category::all();
        
      

        return view("components.profile.adds")->with([
            'myadds'=>$myadds,
            'favourite'=>$favourite,
            'categories'=>$category

        ]);
    }

 public function save_image(Request $request)
{
    $files = request('file');
    dd($files);


}

public function save_add(Request $request)
{


    if ($request->hasFile('profile_photo')) {
        //  Let's do everything here
       
            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        
            
            $user->avatar= $imageName;
    }


    $files = request('file');
    $img_array=[];
    // dd($files);
    if(count($files)>0){
        foreach($files as $file){
            // $file=base64_decode($file);
            $imageName =  time().'.'.$file->getClientOriginalName();
           
            
            $file->move(public_path('assets/img/adds'),$imageName);
            array_push($img_array,$imageName);
        }

      
        try{
        $add=new adds;
        $add->title=$request->title;
        $add->description =$request->desc;
        $add->price =$request->price;
        $add->user_id = auth::user()->id;
        $add->cat_id=$request->cat;
        $add->location =$request->location;
        $add->photos = json_encode($img_array);
        $add->save();

        return response("1",200);
        }
        catch(\Illuminate\Database\QueryException $e) {
            return
            response($e, 404);
           
          }
    }
    else{
        return  response('01', 404);
        // ->with('error','Error in posting.Try Again.');
    }



    
}

public function view_add(Request $request,$id){
    $myadds=adds::where("adds.id",$id)
        ->leftjoin('category','category.id','adds.cat_id')
        ->select("adds.*","category.name as cat_name")
        ->first();


        $fav_check=fav_adds::where("user_id",auth::user()->id)->where("add_id",$id)->first();
       
        return view("components.view_add")->with(["add"=>$myadds,"check"=>$fav_check]);

}


public function update_fav(Request $request){
if($request->id==1){
    $fav_add = new fav_adds;
    $fav_add->add_id=$request->add_id;

    $fav_add->user_id=auth::user()->id;

$fav_add->save();
     
    

}
else{
$flight=fav_adds::where("user_id",auth::user()->id)->where("add_id",$request->add_id)->delete();

}


}


public function edit_add(Request $request,$id){
    $myadd=adds::where("adds.id",$id)
    ->leftjoin('category','category.id','adds.cat_id')
    ->select("adds.*","category.name as cat_name")
    ->first();
    $category=category::all();



return view("components.edit_add")->with([
    'myadd'=>$myadd,
  
    'categories'=>$category

]);

}


public function edit_s_add(Request $request,$id){

    $flight = adds::where('id', $id)
    ->update(
        ['price' => $request->price, 'title' => $request->title,'description'=>$request->desc]
    );
  

    return redirect()->route('view_add', ['id' => $id])->with('message', 'Add Updated!');
}


public function del_add(Request $request,$id){

adds::where("id",$id)->delete();

return redirect()->route("myadds")->with('message', 'Add Deleted!');

}


public function home(){
    $myadds=DB::table("adds")->select("*")->take(3) ->orderBy('id', 'desc')->get();


   return view("welcome")->with("adds",$myadds);
}

}
