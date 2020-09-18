<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContatosMsg Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $assunto
 * @property string $mensagem
 * @property int|null $user_id
 * @property int $conts_msgs_sit_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ContsMsgsSit $conts_msgs_sit
 */
class ContatosMsg extends Entity
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
        'nome' => true,
        'email' => true,
        'assunto' => true,
        'mensagem' => true,
        'user_id' => true,
        'conts_msgs_sit_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'conts_msgs_sit' => true
    ];
}
