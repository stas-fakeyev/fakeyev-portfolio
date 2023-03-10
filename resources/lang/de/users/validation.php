<?php

return [
'login' => [
'required' => 'логин не может быть пустым',
'string' => 'логин должен быть строкой',
'max' => 'можно ввести максимум 50 символов',
'unique' => 'логин должен быть уникальным',
],
'name' => [
'required' => 'Имя не может быть пустым',
'string' => 'имя должно быть строкой',
'max' => 'можно ввести максимум 50 символов',
],
'email' => [
'required' => 'Эл-почта не может быть пустой',
'string' => 'Эл-почта должна быть строкой',
'email' => 'Некорректная Эл-почта',
'max' => 'Можно ввести максимум 50 символов',
'unique' => 'Эл-почта должна быть уникальной',
],
'password' => [
'required' => 'Пароль не может быть пустым',
'string' => 'Пароль должен быть строкой',
'max' => 'можно ввести максимум 50 символов',
],
'avatar' => [
'mimes' => 'Можно использовать форматы: jpeg, jpg, png',
'max' => 'Максимальный размер файла - 5000',
],
'role_id' => [
'required' => 'Выберите роль',
'integer' => 'id роли должен быть числом',
'support' => 'Такая роль не существует',
],
];
