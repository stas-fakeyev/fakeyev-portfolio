<?php

return [
'title' => [
'required' => 'the Title cannot be empty',
'string' => 'the Title has to be a string',
'max' => 'you can write maximum 60 symbols',
'unique' => 'the Title has to be unique',
],
'url' => [
'required' => 'the Url cannot be empty',
'string' => 'the Url has to be a string',
'max' => 'you can write maximum 100 symbols',
'unique' => 'the Url has to be unique',
],
];
