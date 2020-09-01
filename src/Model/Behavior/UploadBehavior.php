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
        echo "uploadBehavior: ". $destine;
        dd($file);

        return $this->upload($file, $destine);

    }

    protected function upload($file, $destine)
    {
        extract($file);
        if(move_uploaded_file($tmp_name, $destine . $name)){
            return true;
        }else{
            return false;
        }
    }
}
