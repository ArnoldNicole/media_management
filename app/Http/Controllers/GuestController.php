<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    /*
    Get all files and show them to user
    */
    public function files(Request $request)
    {
        $files = File::orderBy('created_at', 'DESC')->get();
        return Inertia::render('Guest/Sections/files', ['files' => $files]);
    }


    public function  download($id)
    {
        $file = File::find($id);
        $name = env('app_url') . '/files/' . $file->file;
        return response()->json(['file' => $name], 200);
        // return Storage::download($name, $file->filename);
    }

    public function help()
    {
        return Inertia::render('Guest/Sections/help');
    }

    public function dashboard()
    {

        return Inertia::render('Dashboard');
    }

    public function stats()
    {
        return  [
            'Users' => User::count(),
            'Music' => $this->countMusic(),
            'Documents' => $this->countDocuments(),
            'Videos' => $this->countVideos(),
            'Images' => $this->countImages(),
        ];
    }
    private function countMusic()
    {
        return File::where('file', 'like', '%.mp3')
            ->orWhere('file', 'like', '%.wav')
            ->count();
    }
    private function countDocuments()
    {
        return File::where('file', 'like', '%.doc')
            ->orWhere('file', 'like', '%.docx')
            ->orWhere('file', 'like', '%.pdf')
            ->orWhere('file', 'like', '%.xls')
            ->orWhere('file', 'like', '%.xlxs')
            ->count();
    }
    private function countVideos()
    {
        return File::where('file', 'like', '%.mp4')
            ->orWhere('file', 'like', '%.mkv')
            ->orWhere('file', 'like', '%.webm')
            ->count();
    }
    private function countImages()
    {
        return File::where('file', 'like', '%.png')
            ->orWhere('file', 'like', '%.bmp')
            ->orWhere('file', 'like', '%.jpg')
            ->orWhere('file', 'like', '%.jpeg')
            ->orWhere('file', 'like', '%.gif')
            ->count();
    }
}
