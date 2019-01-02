<?php

namespace App\Http\Controllers;
use App\AdminCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $categories= AdminCategories::all();
        return view('admin.category.index',compact('categories','years'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=AdminCategories::all();
        return view('admin.category.index',compact('categories'));
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
            $file->move('categories',$name);
            $input['image']=$name;
        }

        AdminCategories::create($input);
        Session::flash('success','Category Added Successfully');
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
            $path=AdminCategories::find($id)->image;
            if($path && file_exists(public_path().'/categories/'.$path)){
                unlink(public_path().'/categories/'.$path);
            }
            $name=time().$file->getClientOriginalName();
            $file->move('categories',$name);
            $input['image']=$name;
        }

        AdminCategories::find($id)->update($input);
        Session::flash('success','Category Updated Successfully');
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
        $image=AdminCategories::find($id);
        if($image->image && file_exists(public_path().'/categories/'.$image->image)){
            unlink(public_path().'/categories/'.$image->image);
        }
        $image->delete();
        Session::flash('danger','Image Deleted Successfully');
        return redirect()->back();
    }
}
