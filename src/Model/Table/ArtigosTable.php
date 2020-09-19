<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artigos Model
 *
 * @property \App\Model\Table\RobotsTable|\Cake\ORM\Association\BelongsTo $Robots
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 * @property \App\Model\Table\ArtigosTpsTable|\Cake\ORM\Association\BelongsTo $ArtigosTps
 * @property \App\Model\Table\ArtigosCatsTable|\Cake\ORM\Association\BelongsTo $ArtigosCats
 *
 * @method \App\Model\Entity\Artigo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Artigo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Artigo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artigo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artigo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artigo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Artigo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artigo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArtigosTable extends Table
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

        $this->setTable('artigos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Robots', [
            'foreignKey' => 'robot_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Situations', [
            'foreignKey' => 'situation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ArtigosTps', [
            'foreignKey' => 'artigos_tp_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ArtigosCats', [
            'foreignKey' => 'artigos_cat_id',
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
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->scalar('conteudo')
            ->requirePresence('conteudo', 'create')
            ->notEmpty('conteudo');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 220)
            ->requirePresence('imagem', 'create')
            ->notEmpty('imagem');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            ->requirePresence('keywords', 'create')
            ->notEmpty('keywords');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('resumo_publico')
            ->requirePresence('resumo_publico', 'create')
            ->notEmpty('resumo_publico');

        $validator
            ->integer('qnt_acesso')
            ->requirePresence('qnt_acesso', 'create')
            ->notEmpty('qnt_acesso');

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
        $rules->add($rules->existsIn(['robot_id'], 'Robots'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));
        $rules->add($rules->existsIn(['artigos_tp_id'], 'ArtigosTps'));
        $rules->add($rules->existsIn(['artigos_cat_id'], 'ArtigosCats'));

        return $rules;
    }
}
