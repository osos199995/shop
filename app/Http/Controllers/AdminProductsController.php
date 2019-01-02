<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class AdminProductsController extends Controller
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
        $products=Products::all();
        return view('admin.products.index',compact('products','models'));
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
            $file->move('products',$name);
            $input['image']=$name;
        }

        Products::create($input);
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
            $path=Products::find($id)->image;
            if($path && file_exists(public_path().'/products/'.$path)){
                unlink(public_path().'/products/'.$path);
            }
            $name=time().$file->getClientOriginalName();
            $file->move('products',$name);
            $input['image']=$name;
        }

        Products::find($id)->update($input);
        Session::flash('success','Category Updated Successfully');
        return redirect()->back();
    }


    /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */






    public function destroy($id)
        {
            $image = Products::find($id);
            if ($image->image && file_exists(public_path() . '/products/' . $image->image)) {
                unlink(public_path() . '/products/' . $image->image);
            }
            $image->delete();
            Session::flash('danger', 'Image Deleted Successfully');
            return redirect()->back();
        }
    }
