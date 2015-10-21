<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param $filename
     * @return Response
     */
    public function showImage($filename)
    {
        $entry = Image::where('filename', $filename)->first();

        if (!$entry)
            return response(['error' => 'Item was not found!'], 400);

        $file = Storage::get($entry->filename);

        return response($file, 200, ['Content-Type' => $entry->mime]);
    }
}
