<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Depoimento Entity
 *
 * @property int $id
 * @property string $nome_dep
 * @property string $descricao_dep
 * @property string $video_um
 * @property string $video_dois
 * @property string $video_tres
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Depoimento extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome_dep' => true,
        'descricao_dep' => true,
        'video_um' => true,
        'video_dois' => true,
        'video_tres' => true,
        'created' => true,
        'modified' => true
    ];
}
