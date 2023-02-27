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
'max' => 'you can write maximum 70 symbols',
],
'parent_id' => [
'integer' => 'the  Parent id has to be a number',
'exists' => 'this parent Category does not exist',
],
'language' => [
'required' => 'You have to choose a language',
'string' => 'the Code of the Language has to be a string',
'max' => 'you can write maximum 2 symbols',
'support' => 'this Language is not supported',
],
];
