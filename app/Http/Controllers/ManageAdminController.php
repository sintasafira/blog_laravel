<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Hash;

class ManageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
	
	public function __construct() { 
        $this->middleware('auth:admin'); 
    }
	
	public function create(){
		return view('manageadmins.create');
	}
	
	public function store(Request $request){
		$this->validate($request, [
		'name' => 'required',
		'email' => 'required|email|admins:users,email',
		'job_title' => 'required',
		'password' => 'required|min:6|same:confirm-password',
	]);
		$input = $request->all();
		$input['password'] = Hash::make($input['password']);
		$admin = Admin::create($input);
		return redirect()->route('manageadmins.index')
		->with('success','Admin successfully added');
	}
	
	public function show($id){
		$admin = Admin::find($id);
		return view('manageadmins.show',compact('admin'));
	}
	
	public function index(Request $request){
		$admins = Admin::orderBy('id','DESC')->paginate(5);
		return view('manageadmins.index',compact('admins'))
		->with('i', ($request->input('page', 1) - 1) * 5);
	}
}
