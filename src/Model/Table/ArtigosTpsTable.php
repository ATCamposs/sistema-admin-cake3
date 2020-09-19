<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArtigosTps Model
 *
 * @property \App\Model\Table\ArtigosTable|\Cake\ORM\Association\HasMany $Artigos
 *
 * @method \App\Model\Entity\ArtigosTp get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArtigosTp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArtigosTp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArtigosTp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArtigosTp|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArtigosTp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArtigosTp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArtigosTp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArtigosTpsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('artigos_tps');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Artigos', [
            'foreignKey' => 'artigos_tp_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 45)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }
}
