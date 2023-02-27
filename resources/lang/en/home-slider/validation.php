<?php

return [
'title' => [
'required' => 'the Title cannot be empty',
'string' => 'the Title has to be a string',
'max' => 'you can write maximum 50 symbols',
'unique' => 'the Title has to be unique',
],
'subtitle' => [
'required' => 'the Subtitle cannot be empty',
'string' => 'the Subtitle has to be a string',
'max' => 'you can write maximum 90 symbols',
'unique' => 'the Subtitle has to be unique',
],
'slide' => [
'mimes' => 'You can use formates: jpeg, jpg, png',
'max' => 'the Size of the file can be maximum 5000',
],
'language' => [
'required' => 'You have to choose a language',
'string' => 'the Code of the Language has to be a string',
'max' => 'you can write maximum 2 symbols',
'support' => 'this Language is not supported',
],

'background' => [
'mimes' => 'You can use formates: jpeg, jpg, png',
'max' => 'the Size of the file can be maximum 5000',
],
];
