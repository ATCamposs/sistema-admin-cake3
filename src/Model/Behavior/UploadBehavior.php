<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

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
        return $this->upload($file, $destine);
    }

    protected function upload($file, $destine)
    {
        extract($file);
        $name = $this->slug($name);
        if(move_uploaded_file($tmp_name, $destine . $name)){
            return $name;
        }else{
            return false;
        }
    }

    public function slug($name)
    {
        $formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';
        $name = strtr(utf8_decode($name), utf8_decode($formato['a']), $formato['b']);
        $name = str_replace(' ', '-', $name);

        // complexo e pouco efetivo
        //$name = str_replace(['-----', '----', '---', '--'], '-', $name);

        //atualizado e funcional
        $name = preg_replace('/--+/', '-', $name);
        $name = strtolower($name);

        return $name;
    }
}
