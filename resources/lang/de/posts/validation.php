<?php

return [
'title' => [
'required' => 'Заголовок поста не может быть пустым',
'string' => 'Заголовок поста должен быть строкой',
'max' => 'можно ввести максимум 60 символов',
'unique' => 'Заголовок поста должен быть уникальным',
],
'slug' => [
'string' => 'чпу должно быть строкой',
'max' => 'можно ввести максимум 100 символов',
'unique' => 'чпу должно быть уникальным',
],
'image' => [
'mimes' => 'Можно использовать форматы: jpeg, jpg, png',
'max' => 'Максимальный размер файла - 5000',
],
'language' => [
'required' => 'Выберите язык',
'string' => 'Код языка должен быть строкой',
'max' => 'Можно ввести максимум 2 символа',
'support' => 'Этот язык не поддерживается',
],
'text' => [
'required' => 'Текст не может быть пустым',
'string' => 'Текст должен быть строкой',
'max' => 'можно ввести максимум 60000 символов',
],
'totalpost_id' => [
'integer' => 'total post id должен быть числом',
'exists' => 'id несуществует',
],
];