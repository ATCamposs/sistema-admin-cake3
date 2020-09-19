<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RedesSocias Model
 *
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\RedesSocia get($primaryKey, $options = [])
 * @method \App\Model\Entity\RedesSocia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RedesSocia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RedesSocia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RedesSocia|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RedesSocia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RedesSocia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RedesSocia findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RedesSociasTable extends Table
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

        $this->setTable('redes_socias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Situations', [
            'foreignKey' => 'situation_id',
            'joinType' => 'INNER'
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
            ->scalar('titulo')
            ->maxLength('titulo', 220)
            ->notEmpty('titulo', 'Titulo da rede social é obrigatório');

        $validator
            ->scalar('link')
            ->maxLength('link', 220)
            ->notEmpty('link', 'Link da rede social é obrigatório');

        $validator
            ->scalar('icone')
            ->maxLength('icone', 45)
            ->notEmpty('icone', 'Ícone da rede social é obrigatório');

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

    public function getListRedeSocias()
    {
        $query = $this->find()
                    ->select(['titulo', 'link', 'icone'])
                    ->where(['RedesSocias.situation_id = ' => 1])
                    ->limit(20);
        return $query;
    }
}