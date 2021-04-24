<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    /*
    Get all files and show them to user
    */
    public function files(Request $request){
    	$files = File::orderBy('created_at','DESC')->get();
   	 return Inertia::render('Guest/Sections/files', ['files'=>$files]);    	
    }

    public function test(){
    	return Inertia::render('Admin/Test');
    }
    public function  download($id)
    {
        $file = File::find($id);
        $name = env('app_url').'/files/'.$file->file;
        return response()->json(['file'=>$name],200);     
       // return Storage::download($name, $file->filename);
    }
}
