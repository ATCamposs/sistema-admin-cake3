<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContsMsgsSits Model
 *
 * @property \App\Model\Table\ColorsTable|\Cake\ORM\Association\BelongsTo $Colors
 * @property \App\Model\Table\ContatosMsgsTable|\Cake\ORM\Association\HasMany $ContatosMsgs
 *
 * @method \App\Model\Entity\ContsMsgsSit get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContsMsgsSit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContsMsgsSit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContsMsgsSit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContsMsgsSit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContsMsgsSit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContsMsgsSit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContsMsgsSit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContsMsgsSitsTable extends Table
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

        $this->setTable('conts_msgs_sits');
        $this->setDisplayField('nome_sit_msg_cont');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Colors', [
            'foreignKey' => 'color_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ContatosMsgs', [
            'foreignKey' => 'conts_msgs_sit_id'
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
            ->scalar('nome_sit_msg_cont')
            ->maxLength('nome_sit_msg_cont', 220)
            ->requirePresence('nome_sit_msg_cont', 'create')
            ->notEmpty('nome_sit_msg_cont');

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
        $rules->add($rules->existsIn(['color_id'], 'Colors'));

        return $rules;
    }
}
