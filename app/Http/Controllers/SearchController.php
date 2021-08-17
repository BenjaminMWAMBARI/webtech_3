<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
use App\Models\User;
use App\Models\adds;
use App\Models\fav_adds;
use App\Models\category;


class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $adds=adds::
        leftjoin('category','category.id','adds.cat_id')
        ->select("adds.*","category.name as cat_name")
        ->orderBy('adds.id', 'desc')
        ->simplePaginate(3);
       
        
        return view("components.search.index")->with(['adds'=>$adds]);


    }

    public function search(Request $request){
        // $input=$request->input();
        // DB::connection()->enableQueryLog();
        // // $query=adds::
        // // leftjoin('category','category.id','adds.cat_id')
        // // ->select("adds.*","category.name as cat_name")
        // // ->orderBy('adds.id', 'desc')->get();
        // $query="select `adds`.*, `category`.`name` as `cat_name` from `adds` 
        // left join `category` on `category`.`id` = `adds`.`cat_id` ";
        
        // // order by `adds`.`id` desc

        // if(isset($input['cat'])){
        // $query.="or where category.id=".$input['cat'];

        // }
        // if(isset($input['loc'])){
        //     $query.="or where adds.location=".$input['loc'];
           
        // }
        
        // // $query.=simplePaginate(3);
        // dd( DB::getQueryLog());


    }
}
