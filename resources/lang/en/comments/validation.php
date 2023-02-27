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
'post_id' => [
'required' => 'the Post id cannot be empty',
'integer' => 'the Post id has to be a number',
'exists' => 'this Post does not exist',
],
'parent_id' => [
'integer' => 'the  Parent id has to be a number',
'exists' => 'this parent Comment does not exist',
],
];
