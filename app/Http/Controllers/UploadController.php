<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Upload;

class UploadController extends Controller
{
	public function index(Request $request) {
$uploads = Upload::orderBy('id','DESC')->paginate(5);
return view('uploads.index',compact('uploads'))
->with('i', ($request->input('page', 1) - 1) * 5);
}
	public function store(Request $request)
{
$this->validate($request, [
'name' => 'required',
'image' => 'required|mimes:jpeg,png,jpg',
'file' => 'required|mimes:pdf,doc,docx',
]);
$input = $request->all();
$imageName = '';
if ($request->hasFile('image')) {
$imageExtension = $request->file('image')->getClientOriginalExtension();
$imageName = 'image_'.time().'.'.$imageExtension;
$imageDestination = base_path() . '/public/uploads';
$request->file('image')->move($imageDestination, $imageName);
$input['image'] = $imageName;
}
$fileName = '';
if ($request->hasFile('file')) {
$fileExtension = $request->file('file')->getClientOriginalExtension();
$fileName = 'file_'.time().'.'.$fileExtension;
$fileDestination = base_path() . '/public/uploads';
$request->file('file')->move($fileDestination, $fileName);
$input['file'] = $fileName;
}
$upload = Upload::create($input);
return redirect()->route('upload.index')
->with('success','Image/file successfully added');
}
    public function create()
	{
		return view('uploads.create');
	}
	
	
	
}
