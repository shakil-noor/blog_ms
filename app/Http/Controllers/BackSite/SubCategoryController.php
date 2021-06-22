<?php

namespace App\Http\Controllers\BackSite;

use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::latest()->get();
        return view('BackSite.SubCategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('BackSite.subCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->slug =$request->name.rand();
        $subCategory->category_id = $request->category_id;
        $subCategory->description = $request->description;
        
        try{
            $subCategory->save();
            return redirect()->route('subCategory.index')->with('success', 'Sub Category Created successfully!');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
            
        }
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
        //
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
