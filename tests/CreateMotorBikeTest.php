<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateMotorBikeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('motorbike/create')
            ->type('New MB', 'name')
            ->type(123, 'cc')
            ->type(180, 'weight')
            ->type(999, 'price')
            ->attach(base_path() . '/public/assets/images/sample.jpg', 'image')
            ->press('Add')
            ->see('Task was successful!');
    }
}
