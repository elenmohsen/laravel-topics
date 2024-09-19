<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials=Testimonial::get();
        return view('admin.testimonials.index' , compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimonial = $request-> validate (['name'=>'required|string|max:100',
                                             'content'=> 'required|string|max:200',
                                             'published'=>'boolean',
                                             'image'=>'required|mimes:jpeg,jpg,png,gif',
                                            ]);
       //dd($testimonial);

        $testimonial['image']=$this->uploadFile($request->image,'assets/admin/images/testimonials'); 
         
       Testimonial::create($testimonial);
       return redirect()->route('testimonials.index'); 
       //return ("data entered successfully");              
    }

    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial= Testimonial::findOrFail($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = $request-> validate (['name'=>'required|string|max:100',
                                             'content'=> 'required|string|max:200',
                                             'published'=>'boolean',
                                             'image'=>'mimes:jpeg,jpg,png,gif',
                                   ]);
        if ($request->hasFile('image')) {
                $testimonial['image'] = $this->uploadFile($request->image, 'assets/admin/images/testimonials');
            }
        Testimonial::where('id', $id)->update($testimonial);
        return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect()->route('testimonials.index');
    }
}
