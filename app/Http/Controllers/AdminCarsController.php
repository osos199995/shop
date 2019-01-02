<?php

namespace App\Http\Controllers;
use App\AdminCategories;
use App\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = [];
        for ($model=1900; $model <= 2018; $model++) $models[$model] = $model;
        $cars=Cars::all();
        $categories=AdminCategories::all();
        return view('admin.cars.index',compact('cars','models','categories'));
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


        $request->validate([
            'image'=>'required|image|mimes:jpg,png,jpeg'
        ]);
        $input=$request->all();
        if($file=$request->file('image')){
            $name=time().$file->getClientOriginalName();
            $file->move('cars',$name);
            $input['image']=$name;
        }

        Cars::create($input);
        Session::flash('success','cars Added Successfully');
        return redirect()->back();
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
        $input=$request->all();
        if($file=$request->file('image')){
            $path=Cars::find($id)->image;
            if($path && file_exists(public_path().'/cars/'.$path)){
                unlink(public_path().'/cars/'.$path);
            }
            $name=time().$file->getClientOriginalName();
            $file->move('cars',$name);
            $input['image']=$name;
        }

        Cars::find($id)->update($input);
        Session::flash('success','cars Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Cars::find($id);
        if ($image->image && file_exists(public_path() . '/cars/' . $image->image)) {
            unlink(public_path() . '/cars/' . $image->image);
        }
        $image->delete();
        Session::flash('danger', 'Image Deleted Successfully');
        return redirect()->back();

    }
}
