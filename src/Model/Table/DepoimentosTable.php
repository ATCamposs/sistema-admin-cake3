<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depoimentos Model
 *
 * @method \App\Model\Entity\Depoimento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Depoimento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Depoimento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Depoimento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depoimento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depoimento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Depoimento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Depoimento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepoimentosTable extends Table
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

        $this->setTable('depoimentos');
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
            ->scalar('nome_dep')
            ->maxLength('nome_dep', 220)
            ->requirePresence('nome_dep', 'create')
            ->notEmpty('nome_dep');

        $validator
            ->scalar('descricao_dep')
            ->maxLength('descricao_dep', 220)
            ->requirePresence('descricao_dep', 'create')
            ->notEmpty('descricao_dep');

        $validator
            ->scalar('video_um')
            ->maxLength('video_um', 320)
            ->requirePresence('video_um', 'create')
            ->notEmpty('video_um');

        $validator
            ->scalar('video_dois')
            ->maxLength('video_dois', 320)
            ->requirePresence('video_dois', 'create')
            ->notEmpty('video_dois');

        $validator
            ->scalar('video_tres')
            ->maxLength('video_tres', 320)
            ->requirePresence('video_tres', 'create')
            ->notEmpty('video_tres');

        return $validator;
    }

    public function getListDepsHome($id)
    {
        $query = $this->find()
                    ->select(['nome_dep', 'descricao_dep', 'video_um', 'video_dois', 'video_tres'])
                    ->where(['Depoimentos.id =' => $id]);
        return $query->first();
    }
}
