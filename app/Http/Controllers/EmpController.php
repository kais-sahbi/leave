<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
       // dd($users);
        return view('admin.employer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.employer.create');
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
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string',
            'departement_id'=>'required',
            'role_id'=>'required',
            'image'=>'mimes:jpeg,jpg,png',
            'start_from'=>'required',
            'designation'=>'required|string',
            'phone_number'=>'required'
        ]);

        $data = $request->all();
       // dd($data);
        if($request->hasFile('image'))
        {
            $image = $request->image->hashName();//name of image
            $request->image->move(public_path('profile'),$image);
        }
        else{//image default
            $image = 'avatar2.png';
        }
        $data['name'] = $request->firstname.' '.$request->lastname;
        $data['image']=$image;
        $data['password']= bcrypt($request->password);
        User::create($data);
        return redirect()->back()->with('message','User created Successfully');

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
     * @para  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.employer.edit',compact('user'));

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
            'name'=>'required',
            //we can keep the same email, l id de user selectionner
            'email' => 'required|string|email|max:255|unique:users,email,'. $id,

            'departement_id'=>'required',
            'role_id'=>'required',
            'image'=>'mimes:jpeg,jpg,png',
            'start_from'=>'required',
            'designation'=>'required|string',
            'phone_number'=>'required'
        ]);
        $data = $request->all();
        $user= User::find($id);
        // dd($data);
        if($request->hasFile('image'))
        {
            $image = $request->image->hashName();//name of image
            $request->image->move(public_path('profile'),$image);
        }
        else{//image default
            $image = $user->image;
        }
        if($request->password)
        {
            $pass=$request->password;
        }else{
            $pass=$user->password;
        }
        $data['image']=$image;
        $data['password']=bcrypt($pass);

       // Non-static method Illuminate\Database\Eloquent\Model::update() cannot be called statically
       //User::update($data);
        $user->update($data);

        return redirect()->back()->with('message','User updated Successfully');
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
        User::find($id)->delete();
        return redirect()->back()->with('message','User deleted Successfully');
    }
}
