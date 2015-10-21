<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotorBike extends Model
{
    protected $table = 'motorbikes';
    protected $fillable = ['name', 'cc', 'color', 'weight', 'price'];
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\\Image', 'imageable');
    }

    /**
     * Creates a motorbike object
     *
     * @param $data
     * @return static
     */
    public static function createMotorBike($data)
    {
        $motorbike = new static($data);
        return $motorbike;
    }
}
