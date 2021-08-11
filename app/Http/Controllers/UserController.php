<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add',[
            'title'     => 'Create New User',
            'type'      => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name'      => 'required',
            'type'      => 'required',
            'email'     => 'required|email',
            'photo_profile' => 'required|mimes:jpg,jpeg,png'
        ]);
        
        $file_name = $request->photo_profile->getClientOriginalName();
        $image = $request->photo_profile->storeAs('thumbnail', $file_name);
        $user_id            = auth()->user()->id;
        
        if($request->input('password')) {
            $password = bcrypt($request->password);
        }else{
            $password = bcrypt('123');
        }
        User::create([
            'name'      => $request->name,
            'username'  => $request->name,
            'type'      => $request->type,
            'email'     => $request->email,
            'password'  => $password,
            'photo_profile' => $image,
        ]);

        return redirect()->route('user.index')->with('success','Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('id',$id)->get();
        return view('admin.users.detail',[
            'users'     => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.users.edit',compact('users'));
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
        $this->validate($request,[
            'name'      => 'required',
            'type'      => 'required',
            'photo_profile' => 'required|size:1024'
        ]);

        if($request->input('password')) {
            $user_data = [
                'name'      => $request->name,
                'type'      => $request->type,
                'password'  => bcrypt($request->password),
                'photo_profile' => $request->photo_profile
            ];
        } else {
            $user_data = [
                'name'      => $request->name,
                'type'      => $request->type
            ];
        }

        $user = User::findOrFail($id);
        $user->update($user_data);
        return redirect()->route('user.index')->with('success','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','Data berhasil di hapus');   
    }
}
