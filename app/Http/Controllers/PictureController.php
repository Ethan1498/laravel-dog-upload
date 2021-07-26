<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;

class PictureController extends Controller
{
    /**
     * Display a listing of all submitted dogs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();

        return view('index', ['pictures' => $pictures]);
    }

    /**
     * Show the form for uploading a new dog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Handle the form submission and save the uploaded dog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);
        
        $file = $request->file;

        $name = $request->get('name');

        $fileName = $file->hashName();


        $pictures = new Picture([ // save to db
            "name" => $name,
            "file_path" => $fileName
        ]);

        $pictures->save(); // Finally, save the record.

        // Save the file locally in the public folder
        $file->move(storage_path('app/public/'), $fileName);

        return redirect('/');
    }

    /**
     * Upvote a dog by ID
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upvote(Request $request, Picture $picture)
    {
        $picture->votes ++;
        $picture->save();

        return redirect('/');
    }
}