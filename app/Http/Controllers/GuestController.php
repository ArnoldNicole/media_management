<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\File;

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
}
