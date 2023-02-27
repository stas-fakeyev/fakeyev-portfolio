<?php

return [
'title' => [
'required' => 'the Title cannot be empty',
'string' => 'the Title has to be a string',
'max' => 'you can write maximum 60 symbols',
'unique' => 'the Title has to be unique',
],
'slug' => [
'string' => 'the slug has to be a string',
'max' => 'you can write maximum 100 symbols',
],
'text' => [
'required' => 'the Text cannot be empty',
'string' => 'the text has to be a string',
'max' => 'you can write maximum 60000 symbols',
],
'image' => [
'mimes' => 'You can use formates: jpeg, jpg, png',
'max' => 'the Size of the file can be maximum 5000',
],
'totalpost_id' => [
'integer' => 'the total post id has to be a number',
'exists' => 'this id does not exist',
],
'language' => [
'required' => 'You have to choose a language',
'string' => 'the Code of the Language has to be a string',
'max' => 'you can write maximum 2 symbols',
'support' => 'this Language is not supported',
],
];
