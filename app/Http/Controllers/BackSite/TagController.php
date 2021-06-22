<?php

namespace App\Http\Controllers\BackSite;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('BackSite.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackSite.tag.create');
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
            'name' => 'required|unique:tags',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        
        try{
            $tag->save();
            return redirect()->route('tag.index')->with('success', 'Tag Created successfully!');
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
    public function edit(Tag $tag)
    {
        return view('BackSite.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        if ($tag->name != $request->name){
            $this->validate($request,[
                'name' => 'required|unique:tags',
            ]);
        }else{
            $this->validate($request,[
                'name' => 'required',
            ]);
        }

        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tag.index')->with('success', 'Tag Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tag.index')->with('success', 'Tag Deleted successfully!');;
    }
}
