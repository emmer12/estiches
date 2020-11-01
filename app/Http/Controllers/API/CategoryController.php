<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Testimony;
use App\User;
use App\Http\Resources\Category as CategoryResouces;
use App\Http\Resources\subCategory as SubCatResouces;
use App\Http\Resources\Testimony as TestimonyResouces;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return CategoryResouces::collection($category);
    }


    public function subCategory($category)
    {
        $category=Category::where("category",$category)->first();
        $sub=Category::find($category->id)->sub_category;
        return SubCatResouces::collection($sub);
    }
    
    public function addSubCategory(Request $request)
    {
        $subCat=serialize($request->data);

        User::where('id',auth()->user()->id)->update([
            'sub_category'=>$subCat,
        ]);

        return response()->json(User::findOrFail(auth()->user()->id), 200);
    }

    public function newTest(Request $request )
    {
        $validator=$request->validate([
            'fullname' => ['required'],
            'message' => ['required']
        ]);

        $test=new Testimony();

        $test->fullname=$request->input('fullname');
        $test->message=$request->input('message');

        $test->save();

        return response()->json(['success'=>true], 200);
    }

    public function getTest()
    {
        $testimony=Testimony::orderBy('created_at','desc')->take(6)->get();
        return TestimonyResouces::collection($testimony);
    }


}
