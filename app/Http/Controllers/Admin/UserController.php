<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::get();
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request-> validate (['firstName'=>'required|string|max:100',
                                      'lastName'=>'required|string|max:100',
                                      'userName'=>'required|string|max:100',
                                      'email'=> 'required|string|max:255|unique:users',
                                      'password'=>'required|string|min:8|confirmed',
                           ]);
        User::create($user);
        return redirect()->route('users.index'); 
        //return ("data entered successfully");    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user= User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request-> validate (['firstName'=>'required|string|max:100',
                                      'lastName'=>'required|string|max:100',
                                      'userName'=>'required|string|max:100',
                                      'email'=> 'sometimes|required|string|email|max:255|unique:users,id',
                                      'password'=>'required|string|min:8',
                                      'active'=>'boolean',
                           ]); 
        User::where('id', $id)->update($user);
        return redirect()->route('users.index');
        //return ("data updated successfully");    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
