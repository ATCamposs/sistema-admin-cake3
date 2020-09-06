<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
/**
 * DeleteFile behavior
 */
class DeleteFileBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function deleteFile($destine)
    {
        $dir = new Folder($destine);

        if($dir->delete()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteProfileImage($destine, $oldFile, $newFile = null)
    {
        if((!!$oldFile) &&  ($oldFile !== $newFile)){
            $file = new File($destine.$oldFile);
            $file->delete($destine.$oldFile);
        }
    }
}
