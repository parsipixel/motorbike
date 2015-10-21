<?php

resource('motorbike', 'MotorBikesController');

get('/', [
    'uses' => 'MotorBikesController@index',
    'as'   => 'home'
]);

get('/image/{filename}', [
    'uses' => 'ImagesController@showImage',
    'as'   => 'image.show'
]);