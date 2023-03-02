<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageSaver
{
    /**
     * Сохраняет изображение при создании или редактировании сущности; создает два уменьшенных изображения.
     *
     * @param \Illuminate\Http\Request $request — объект HTTP-запроса
     * @param \App\Models\Item $item — модель
     * @param string $dir — директория, куда будем сохранять изображение
     * @return string|null — имя файла изображения для сохранения в БД
     */
    public function upload($requestImage, $itemImage, $dir)
    {
        // перед загрузкой нового изображения удаляем старое
        if (!is_null($itemImage)) {
            $this->remove($itemImage, $dir);
        } //endif
        $ext = $requestImage->extension();
        // сохраняем загруженное изображение без всяких изменений
        $path = $requestImage->store($dir.'/source', 'public');
        $path = Storage::disk('public')->path($path); // абсолютный путь
        $name = basename($path); // имя файла
            // создаем уменьшенное изображение 600x300px, качество 100%
        $dst = $dir.'/medium/';
        $this->resize($path, $dst, 600, 300, $ext);
        // создаем уменьшенное изображение 300x150px, качество 100%
        $dst = $dir.'/thumb/';
        $this->resize($path, $dst, 300, 150, $ext);
        return $name;
    }
        /**
         * Создает уменьшенную копию изображения
         *
         * @param string $src — путь к исходному изображению
         * @param string $dst — куда сохранять уменьшенное
         * @param integer $width — ширина в пикселях
         * @param integer $height — высота в пикселях
         * @param string $ext — расширение уменьшенного
         */
        private function resize($src, $dst, $width, $height, $ext)
        {
            // создаем уменьшенное изображение width x height, качество 100%
            $image = Image::make($src)
                ->heighten($height)
                ->resizeCanvas($width, $height, 'center', false, 'eeeeee')
                ->encode($ext, 100);
            // сохраняем это изображение под тем же именем, что исходное
            $name = basename($src);
            Storage::disk('public')->put($dst . $name, $image);
            $image->destroy();
        }
        /**
         * Удаляет изображение при удалении категории, бренда или товара
         *
         * @param \App\Models\Item $item — модель
         * @param string $dir — директория, в которой находится изображение
         */
        public function remove($itemImage, $dir)
        {
            if ($itemImage) {
                Storage::disk('public')->delete($dir.'/source/' . $itemImage);
                Storage::disk('public')->delete($dir.'/medium/' . $itemImage);
                Storage::disk('public')->delete($dir.'/thumb/' . $itemImage);
            }
        }
}
