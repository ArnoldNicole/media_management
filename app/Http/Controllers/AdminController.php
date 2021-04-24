<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\File;
use App\Http\Resources\UserResource;
use App\Models\User;


class AdminController extends Controller
{
   public function index(){
   	 return Inertia::render('Admin/Index');
   }
   public function files(){
      $files = File::orderBy('created_at','DESC')->with('category')->get();
   	 return Inertia::render('Admin/Dashboard/Files', ['files'=>$files]);
   }
   public function requests(){
   	 return Inertia::render('Admin/Request');
   }
   public function users(){
    $users = User::all();
   	 return Inertia::render('Admin/Users',['users'=>$users]);
   }


   /*
   Category Functions   */

   public function createCategory(Request $request){
      //dd($request->all());
      $data = $this->validate($request, [
         'categoryName'=>'required|string|min:5|unique:categories',
         'categoryIcon'=>'required|array'

      ]);

      $imageName=time().'.'.$request->categoryIcon['file']->extension();
      $request->categoryIcon['file']->move(public_path('categoryIcons'), $imageName);

      Category::create([
            'categoryName'=>$data['categoryName'],
            'categoryIcon'=>'/categoryIcons/'.$imageName,
      ]);

      return redirect(route('files'))->with('message','Category Added Successfully');
      
   }
   
   public function newCategory()
   {
     return Inertia::render('Admin/Forms/CreateCategory');  
   }
   public function categories(){
       $categories = Category::orderBy('created_at','DESC')->get();
       return Inertia::render('Admin/Dashboard/Categories', ['categories'=>$categories]);  
   }
   public function deleteCategory(Request $request)
   {
      $id = $request->id;
      $category = Category::find($id);
      //delete the files associated with the file
      //$this->deleteFileFromServer(public_path().'/files/'.$file->file);
      //delete the thumbnail
      //$this->deleteFileFromServer(public_path().'/thumbnails/'.$file->thumbnail);
      //delete the file from database
      // delete assocciated categories
      foreach ($category->files as $file) {
        $file->delete();
      }
      $category->delete();
      return "Deleted Successfully";
     
   }




   /*
   files functions
   */
   public function newFile(){
     $categories = Category::orderBy('created_at','DESC')->get();
     //$data = json_encode($categories);
     return Inertia::render('Admin/Forms/CreateFile', ['categories'=>$categories]);  
   }

   public function saveFile(Request $request)
   {
      $data = $this->validate($request, [
         'file'=>'required|file|max:102400',
         'filename'=>'string|required',
         'category_id'=>'numeric|required',
      ]);

      $fileName=time().'.'.$request->file->extension();
      $request->file->move(public_path('files'), $fileName);      

     $newFile =  File::create([
         'file'=>$fileName,
         'filename'=>$data['filename'],
         'category_id'=>$data['category_id'],
         'thumbnail'=>'sketch.jpg',
      ]);
      return redirect(route('add.thumbanil', $newFile->id))->with('message','File Added Successfully');      
   }

   public function deleteFile(Request $request)
   {
      $id = $request->id;
      $file = File::find($id);
      //delete the files associated with the file
     // $this->deleteFileFromServer(public_path().'/files/'.$file->file);
      //delete the thumbnail
     // $this->deleteFileFromServer(public_path().'/thumbnails/'.$file->thumbnail);
      //delete the file from database
      $file->delete();
      return "File Deleted";
   }

   public function deleteFileFromServer($filePath){
           if (file_exists($filePath)) {
               @unlink($filePath);               
           }
           return ; 
   }

   public function thumbnail(File $file)
   {
      return Inertia::render('Admin/Forms/CreateFileThumbnail',['file'=>$file]);
   }
   public function saveThumbanil(Request $request)
   {
      //dd($request->all());
      $data = $this->validate($request, [
         'id'=>'required',
         'file'=>'required|image|max:500'
      ]);

      $fileName=time().'.'.$request->file->extension();
      $request->file->move(public_path('thumbnails'), $fileName);

      $file = File::find($data['id']);
      $file->update([
         'thumbnail'=>$fileName
      ]);

      return redirect(route('files'))->with('message','File Thumbanail Set Successfully');

   }
   
}


