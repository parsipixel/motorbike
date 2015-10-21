<?php

namespace App\Jobs\MotorBike;

use App\Jobs\CreateImageJob;
use App\Jobs\Job;
use App\MotorBike;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CreateMotorBikeJob extends Job implements SelfHandling
{
    use DispatchesJobs;

    /**
     * @var
     */
    private $data;
    /**
     * @var null
     */
    private $image;

    /**
     * Create a new job instance.
     *
     * @param $data
     * @param null $image
     */
    public function __construct($data, $image)
    {
        $this->data  = $data;
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     */
    public function handle()
    {
        $motorbike = MotorBike::createMotorBike($this->data);
        $motorbike->save();

        if ($this->image) {
            $image = $this->dispatch(new CreateImageJob(
                $this->image,
                $motorbike->id
            ));
            $image->save();
        }

        return $motorbike;
    }
}
