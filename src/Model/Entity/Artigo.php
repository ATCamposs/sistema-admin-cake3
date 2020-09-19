<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artigo Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property string $conteudo
 * @property string $imagem
 * @property string $slug
 * @property string $keywords
 * @property string $description
 * @property string $resumo_publico
 * @property int $qnt_acesso
 * @property int $robot_id
 * @property int $user_id
 * @property int $situation_id
 * @property int $artigos_tp_id
 * @property int $artigos_cat_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Robot $robot
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Situation $situation
 * @property \App\Model\Entity\ArtigosTp $artigos_tp
 * @property \App\Model\Entity\ArtigosCat $artigos_cat
 */
class Artigo extends Entity
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
        'titulo' => true,
        'descricao' => true,
        'conteudo' => true,
        'imagem' => true,
        'slug' => true,
        'keywords' => true,
        'description' => true,
        'resumo_publico' => true,
        'qnt_acesso' => true,
        'robot_id' => true,
        'user_id' => true,
        'situation_id' => true,
        'artigos_tp_id' => true,
        'artigos_cat_id' => true,
        'created' => true,
        'modified' => true,
        'robot' => true,
        'user' => true,
        'situation' => true,
        'artigos_tp' => true,
        'artigos_cat' => true
    ];
}
