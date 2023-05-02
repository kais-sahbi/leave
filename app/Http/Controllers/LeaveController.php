<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*//return all leaves
       $l = Leave::all();*/
      $leaves = Leave::latest()->get();//all leaves triés par ordre décroissant de la date de création (la dernière date de création en premier).
        return view('admin.leave.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();//user_id = user connecté
        //return $leaves;
        return view('admin.leave.create',compact('leaves'));
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
            'from'=>'required',
            'to'=>'required',
            /*'description'=>'required',*/
            'type'=>'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message']='';
        $data['status']=0;
        Leave::create($data);
        return redirect()->back()->with('message','Congé transmis!');

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
        $leave = Leave::find($id);
        return view('admin.leave.edit',compact('leave'));
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
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
           // 'description'=>'required',
            'type'=>'required'
        ]);
        $data = $request->all();
        //dd($data);
        $leave = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['message']='';
        $data['status']=0;
        $leave->update($data);
        return redirect()->route('leave.create')->with('message','congés changé');
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
        Leave::find($id)->delete();
        return redirect()->route('leave.create')->with('message','Congés supprimé');
    }
    public function acceptReject(Request $request,$id){
        $status = $request->status;// elle va retourner 1 ou 0
       // dd($status);
        $message = $request->message;
        $leave = Leave::find($id);
        $leave->update([

            'status' =>$status,
            'message'=>$message

        ]);
        return redirect()->route('leave.list')->with('message','congés traité');
    }
}
