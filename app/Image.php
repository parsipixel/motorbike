<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use SoftDeletes;
    protected $guarded    = ['id'];
    protected $collection = 'images';

    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * @param $image
     * @param $id
     * @return static
     */
    public static function createImage($image, $id)
    {
        $extension = $image->getClientOriginalExtension();

        Storage::put($id . '.' . $extension, File::get($image));

        $img                    = new static();
        $img->mime              = $image->getClientMimeType();
        $img->original_filename = $image->getClientOriginalName();
        $img->filename          = $id . '.' . $extension;

        $img->imageable_type = 'App\\MotorBike';
        $img->imageable_id   = $id;

        return $img;
    }
}
