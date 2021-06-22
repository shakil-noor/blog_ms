<?php

namespace App\Http\Controllers\BackSite;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('BackSite.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackSite.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug =$request->name.rand();
        $category->description = $request->description;
        
        try{
            $category->save();
            return redirect()->route('category.index')->with('success', 'Category Created successfully!');
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
    public function edit(Category $category)
    {
        return view('BackSite.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($category->name != $request->name){
            $this->validate($request,[
                'name' => 'required|unique:categories',
                'description' => 'required',
            ]);
        }else{
            $this->validate($request,[
                'name' => 'required',
                'description' => 'required',
            ]);
        }

        $category->name = $request->name;
        $category->slug =$request->name.rand();
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('success', 'Category Deleted successfully!');;
    }
}
