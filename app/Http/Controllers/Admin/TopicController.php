<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category; 
use App\Traits\Common;

class TopicController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics=Topic::get();
        return view('admin.topics.index' , compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::select('id','category_name')->get();
        return view('admin.topics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = $request-> validate (['topicTitle'=>'required|string|max:100',
                                       'content'=> 'required|string|max:200',
                                       'trending'=>'boolean',
                                       'published'=>'boolean',
                                       'image'=>'required|mimes:jpeg,jpg,png,gif',
                                       'category_id'=>'required',
                       ]);
        $topic['image']=$this->uploadFile($request->image,'assets/admin/images/topics'); 
        Topic::create($topic);
       return redirect()->route('topics.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic= Topic::findOrFail($id);
        return view ('admin.topics.topic_detail', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories= Category::select('id','category_name')->get();
        $topic= Topic::findOrFail($id);
        return view('admin.topics.edit', compact('topic'),compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = $request-> validate (['topicTitle'=>'required|string|max:100',
                                       'content'=> 'required|string|max:200',
                                       'trending'=>'boolean',
                                       'published'=>'boolean',
                                       'image'=>'mimes:jpeg,jpg,png,gif',
                                       'category_id'=>'required',
                           ]);
        if ($request->hasFile('image')) {
            $topic['image'] = $this->uploadFile($request->image, 'assets/admin/images/topics');
        } 

        Topic::where('id', $id)->update($topic);
        return redirect()->route('topics.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Topic::where('id', $id)->delete();
        return redirect()->route('topics.index');
    }
}
