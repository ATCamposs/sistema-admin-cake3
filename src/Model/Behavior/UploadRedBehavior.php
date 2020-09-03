<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

/**
 * UploadRed behavior
 */
class UploadRedBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function singleUploadImgRed(array $file, $destine, $width, $height)
    {
        $this->createDirectoryImgRed($destine);

        $this->checkImageType($file, $destine, $width, $height);
        //retornaria imagem original
        //return $this->upload($file, $destine);
        
        //retorna imagem redimensionada
        return true;
    }

    public function checkImageType($file, $destine, $width, $height)
    {
        extract($file);
        switch ($type) {
            case 'image/jpeg';
            case 'image/pjpeg';
                $image = imagecreatefromjpeg($tmp_name);
                $imageResized = $this->resizeImage($image, $width, $height);
                imagejpeg($imageResized, $destine.$name);
                break;
            case 'image/png';
            case 'image/x-png';
                $image = imagecreatefrompng($tmp_name);
                $imageResized = $this->resizeImage($image, $width, $height);
                imagepng($imageResized, $destine.$name);
                break;

        }
    }
    protected function resizeImage($image, $width, $height)
    {
        $original_width = imagesx($image);
        $original_height = imagesy($image);
        
        $imageResized = imagecreatetruecolor($width, $height);

        imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $width, $height, $original_width, $original_height);
        
        return $imageResized;
    }

    protected function createDirectoryImgRed($destine)
    {
        $dir = new Folder($destine);

        if(!$dir->path){
            $dir->create($destine);
        }
    }

    protected function upload($file, $destine)
    {
        extract($file);
        //$name = $this->slug($name);
        if(move_uploaded_file($tmp_name, $destine . $name)){
            return $name;
        }else{
            return false;
        }
    }

    public function uploadSlugImgRed($name)
    {
        $format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';
        $name = strtr(utf8_decode($name), utf8_decode($format['a']), $format['b']);
        $name = str_replace(' ', '-', $name);

        // complexo e pouco efetivo
        //$name = str_replace(['-----', '----', '---', '--'], '-', $name);

        //atualizado e funcional
        $name = preg_replace('/--+/', '-', $name);
        $name = strtolower($name);

        return $name;
    }
}
