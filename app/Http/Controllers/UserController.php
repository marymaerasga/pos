<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
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
      $users = new User;
      $users->id = $request->id;
      $users->name = $request->name;
      $users->email = $request->email;
      $users->password =  Hash::make($request->password);
      $users->phone_number = $request->phone_number;
      $users->address = $request->address;

      if($request->hasfile('image')){
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time() .'.'. $extension;
          $file->move('uploads/images/', $filename);
          $users->image = $filename;
      }
      $users->role_as = $request->role_as;
      $users->save();

      if($users){
          Session::flash('statuscode','success');
          return redirect()->back()->with('message','User Successfully Added!');
      }
      Session::flash('statuscode','error');
      return redirect()->back()->with('message','User fail to add!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = md5($request->password);
        $users->phone_number = $request->phone_number;
        $users->address = $request->address;
  
        if($request->hasfile('image')){
            $destination='uploads/images/'.$users->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('uploads/images/', $filename);
            $users->image = $filename;
        }
        $users->role_as = $request->role_as;
        $users->update();

        Session::flash('statuscode','success');
        return redirect()->back()->with('message','User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if(!$users){
            Session::flash('statuscode','warning');
            return back()->with('message', 'User not found!');
        }
        $users->delete();
        Session::flash('statuscode','error');
        return back()->with('message','User Deleted Successfully!');
    
    }
}
