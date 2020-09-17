<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmpresasSobs Model
 *
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\EmpresasSob get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpresasSob newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmpresasSob[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresasSob|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresasSob|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresasSob patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresasSob[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresasSob findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresasSobsTable extends Table
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

        $this->setTable('empresas_sobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteFile');

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
            ->notEmpty('titulo', 'Titulo do sobre empresa é obrigatório');

        $validator
            ->scalar('descricao')
            ->notEmpty('descricao', 'Descrição do sobre empresa é obrigatório');
        
        $validator
            ->notEmpty('imagem', 'Necessário selecionar a foto')
            ->add('imagem', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'Extensão da foto inválida. Selecione foto JPEG ou PNG',
            ]);

        $validator
            ->integer('ordem')
            ->notEmpty('ordem');

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

    public function getUltimoEmpresasSobs()
    {
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->order(['EmpresasSobs.ordem' => 'DESC']);
        return $query->first();
    }

    public function getEmpresasSobsProx($ordem)
    {
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['EmpresasSobs.ordem >' => $ordem])
                    ->order(['EmpresasSobs.ordem' => 'ASC']);
        return $query;
    }

    public function getEmpresasSobsAtual($id)
    {
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['EmpresasSobs.id =' => $id])
                    ->order(['EmpresasSobs.ordem' => 'DESC']);
        return $query->first();
    }

    public function getEmpresasSobsMenor($ordemMenor)
    {
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['EmpresasSobs.ordem =' => $ordemMenor])
                    ->order(['EmpresasSobs.ordem' => 'DESC']);
        return $query->first();
    }
}