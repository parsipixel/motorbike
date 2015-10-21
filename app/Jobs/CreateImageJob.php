<?php

namespace App\Jobs;

use App\Image;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateImageJob extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $image;
    /**
     * @var
     */
    private $id;

    /**
     * Create a new job instance.
     *
     * @param $image
     * @param $id
     */
    public function __construct($image, $id)
    {
        $this->image = $image;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     */
    public function handle()
    {
        $image = Image::createImage($this->image, $this->id);
        $image->save();

        return $image;
    }
}
