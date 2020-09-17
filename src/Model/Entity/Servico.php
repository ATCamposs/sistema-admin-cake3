<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Servico Entity
 *
 * @property int $id
 * @property string $titulo_ser
 * @property string $icone_um
 * @property string $titulo_um
 * @property string $descricao_um
 * @property string $icone_dois
 * @property string $titulo_dois
 * @property string $descricao_dois
 * @property string $icone_tres
 * @property string $titulo_tres
 * @property string $descricao_tres
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Servico extends Entity
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
        'titulo_ser' => true,
        'icone_um' => true,
        'titulo_um' => true,
        'descricao_um' => true,
        'icone_dois' => true,
        'titulo_dois' => true,
        'descricao_dois' => true,
        'icone_tres' => true,
        'titulo_tres' => true,
        'descricao_tres' => true,
        'created' => true,
        'modified' => true
    ];
}
