<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
/**
 * Upload behavior
 */
class UploadBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function singleUpload(array $file, $destine)
    {
        $this->createDirectory($destine);

        return $this->upload($file, $destine);
    }

    public function createDirectory($destine)
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

    public function uploadSlug($name)
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
