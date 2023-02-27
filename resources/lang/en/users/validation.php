<?php

return [
'login' => [
'required' => 'the Login cannot be empty',
'string' => 'the Login has to be a string',
'max' => 'you can write maximum 50 symbols',
'unique' => 'the Login has to be unique',
],
'name' => [
'required' => 'the Name cannot be empty',
'string' => 'the Name has to be a string',
'max' => 'you can write maximum 50 symbols',
],
'email' => [
'required' => 'the Email cannot be empty',
'string' => 'the Email has to be a string',
'email' => 'the wrong Email',
'max' => 'you can write maximum 50 symbols',
'unique' => 'the Email has to be unique',
],
'password' => [
'required' => 'the Password cannot be empty',
'string' => 'the Password has to be a string',
'max' => 'you can write maximum 50 symbols',
],
'avatar' => [
'mimes' => 'You can use formates: jpeg, jpg, png',
'max' => 'the Size of the file can be maximum 5000',
],
'role_id' => [
'required' => 'You have to choose a Role',
'integer' => 'the role has to be a number',
'support' => 'this role is not supported',
],

];
