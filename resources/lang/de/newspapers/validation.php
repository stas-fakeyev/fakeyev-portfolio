<?php

return [
'title' => [
'required' => 'Заголовок не может быть пустым',
'string' => 'Заголовок должен быть строкой',
'max' => 'можно ввести максимум 60 символов',
'unique' => 'Заголовок должен быть уникальным',
],
'url' => [
'required' => 'url не может быть пустым',
'string' => 'Url должен быть строкой',
'max' => 'можно ввести максимум 100 символов',
'unique' => 'Url должен быть уникальным',
],
];
