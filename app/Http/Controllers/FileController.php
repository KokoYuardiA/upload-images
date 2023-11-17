<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showForm()
    {
        return view('file.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:zip|max:10240', // max 10 MB
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'minio');

        return redirect()->back()->with('path', $path);
    }
}
