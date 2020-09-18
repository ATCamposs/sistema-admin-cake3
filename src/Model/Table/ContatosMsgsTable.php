<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContatosMsgs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ContsMsgsSitsTable|\Cake\ORM\Association\BelongsTo $ContsMsgsSits
 *
 * @method \App\Model\Entity\ContatosMsg get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContatosMsg newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContatosMsg[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContatosMsg|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContatosMsg|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContatosMsg patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContatosMsg[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContatosMsg findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContatosMsgsTable extends Table
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

        $this->setTable('contatos_msgs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('ContsMsgsSits', [
            'foreignKey' => 'conts_msgs_sit_id',
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
            ->scalar('nome')
            ->maxLength('nome', 220)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('assunto')
            ->maxLength('assunto', 220)
            ->requirePresence('assunto', 'create')
            ->notEmpty('assunto');

        $validator
            ->scalar('mensagem')
            ->requirePresence('mensagem', 'create')
            ->notEmpty('mensagem');

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
        //E-mail nao precisa ser unico, ṕde ser um por mensagem.
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['conts_msgs_sit_id'], 'ContsMsgsSits'));

        return $rules;
    }
}
