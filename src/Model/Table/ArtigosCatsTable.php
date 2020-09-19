<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArtigosCats Model
 *
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 * @property \App\Model\Table\ArtigosTable|\Cake\ORM\Association\HasMany $Artigos
 *
 * @method \App\Model\Entity\ArtigosCat get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArtigosCat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArtigosCat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArtigosCat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArtigosCat|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArtigosCat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArtigosCat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArtigosCat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArtigosCatsTable extends Table
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

        $this->setTable('artigos_cats');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Situations', [
            'foreignKey' => 'situation_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Artigos', [
            'foreignKey' => 'artigos_cat_id'
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
            ->maxLength('nome', 220)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));

        return $rules;
    }
}
