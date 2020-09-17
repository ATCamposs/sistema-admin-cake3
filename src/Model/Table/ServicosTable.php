<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicos Model
 *
 * @method \App\Model\Entity\Servico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servico|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servico findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServicosTable extends Table
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

        $this->setTable('servicos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('titulo_ser')
            ->maxLength('titulo_ser', 220)
            ->requirePresence('titulo_ser', 'create')
            ->notEmpty('titulo_ser');

        $validator
            ->scalar('icone_um')
            ->maxLength('icone_um', 45)
            ->requirePresence('icone_um', 'create')
            ->notEmpty('icone_um');

        $validator
            ->scalar('titulo_um')
            ->maxLength('titulo_um', 45)
            ->requirePresence('titulo_um', 'create')
            ->notEmpty('titulo_um');

        $validator
            ->scalar('descricao_um')
            ->requirePresence('descricao_um', 'create')
            ->notEmpty('descricao_um');

        $validator
            ->scalar('icone_dois')
            ->maxLength('icone_dois', 45)
            ->requirePresence('icone_dois', 'create')
            ->notEmpty('icone_dois');

        $validator
            ->scalar('titulo_dois')
            ->maxLength('titulo_dois', 45)
            ->requirePresence('titulo_dois', 'create')
            ->notEmpty('titulo_dois');

        $validator
            ->scalar('descricao_dois')
            ->requirePresence('descricao_dois', 'create')
            ->notEmpty('descricao_dois');

        $validator
            ->scalar('icone_tres')
            ->maxLength('icone_tres', 45)
            ->requirePresence('icone_tres', 'create')
            ->notEmpty('icone_tres');

        $validator
            ->scalar('titulo_tres')
            ->maxLength('titulo_tres', 45)
            ->requirePresence('titulo_tres', 'create')
            ->notEmpty('titulo_tres');

        $validator
            ->scalar('descricao_tres')
            ->requirePresence('descricao_tres', 'create')
            ->notEmpty('descricao_tres');

        return $validator;
    }
}
