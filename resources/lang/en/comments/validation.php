<?php

return [
'name' => [
'string' => 'the Comment has to be a string',
'max' => 'you can write maximum 50 symbols',
],
'email' => [
'email' => 'the email has to be like an email',
'max' => 'you can write maximum 50 symbols',
],
'text' => [
'required' => 'the Text cannot be empty',
'string' => 'the text has to be a string',
'max' => 'you can write maximum 50000 symbols',
],
'commentable_id' => [
'required' => 'the  id cannot be empty',
'integer' => 'the  id has to be a number',
],
'commentable_type' => [
'required' => 'the Type cannot be empty',
'string' => 'the Type has to be a string',
],
'parent_id' => [
'integer' => 'the  Parent id has to be a number',
'exists' => 'this parent Comment does not exist',
],
];
