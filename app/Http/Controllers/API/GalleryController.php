<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Http\Resources\Gallery as GalleryResource;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery=Gallery::orderBy('created_at','desc')->get();
        return GalleryResource::collection($gallery);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'image' => ['required'],
            'category' => ['required']
        ]);

        if ($request->hasFile('image')) {
            $fileWithExt=$request->file('image')->getClientOriginalName();
      
            $fileName=pathinfo($fileWithExt,PATHINFO_FILENAME);
            //get extension only
            $fileEx=$request->file('image')->getClientOriginalExtension();
            // file name to store
            $fileNametoStore=$fileName.'_'.time().'.'.$fileEx;
            // upload image
            $path=$request->file('image')->storeAs("public/uploads/images",$fileNametoStore);
        }
        $gallery=new Gallery();

        
        $gallery->filename=$fileNametoStore;
        $gallery->category=$request->input('category');
        // $gallery->special=$request->get('special');

        $gallery->save();

        return response()->json(['success'=>true],200);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $validator=$request->validate([
        //     'ids' => ['required','array'],
        // ]);

        Gallery::destroy($request->id);
        
        return response()->json(['success'=>true],200);
    }
}
