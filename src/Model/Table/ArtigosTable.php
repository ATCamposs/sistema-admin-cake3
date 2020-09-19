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
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteFile');
        $this->addBehavior('SlugUrl');

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
            ->notEmpty('titulo', 'Titulo do artigo é obrigatório');

        $validator
            ->scalar('descricao')
            ->notEmpty('descricao', 'Descrição do artigo é obrigatório');

        $validator
            ->scalar('conteudo')
            ->notEmpty('conteudo', 'Conteúdo do artigo é obrigatório');

        $validator
            ->notEmpty('imagem', 'Necessário selecionar a foto')
            ->add('imagem', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'Extensão da foto inválida. Selecione foto JPEG ou PNG',
            ]);

        $validator
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->notEmpty('slug', 'Slug do artigo é obrigatório');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            ->notEmpty('keywords', 'Palavra chave do artigo é obrigatório');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->notEmpty('description');

        $validator
            ->scalar('resumo_publico')
            ->notEmpty('resumo_publico', 'Resumo público do artigo é obrigatório');

        $validator
            ->integer('qnt_acesso')
            ->notEmpty('qnt_acesso', 'Quantidade de acesso ao artigo é obrigatório');

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

    public function getVerArtigo($slug)
    {
        $query = $this->find()
                    ->select(['id', 'titulo', 'conteudo', 'created'])
                    ->where(['Artigos.slug =' => $slug, 'Artigos.situation_id =' => 1]);
        return $query->first();
    }

    public function getArtigoAnt($id)
    {
        $query = $this->find()
                    ->select(['slug'])
                    ->where(['Artigos.id <' => $id, 'Artigos.situation_id =' => 1])
                    ->order(['Artigos.id' => 'DESC']);
        return $query->first();
    }

    public function getArtigoProx($id)
    {
        $query = $this->find()
                    ->select(['slug'])
                    ->where(['Artigos.id >' => $id, 'Artigos.situation_id =' => 1])
                    ->order(['Artigos.id' => 'ASC']);
        return $query->first();
    }

    public function getArtigoUltimos()
    {
        $query = $this->find()
                    ->select(['titulo', 'slug'])
                    ->where(['Artigos.situation_id =' => 1])
                    ->order(['Artigos.id' => 'DESC'])
                    ->limit(6);
        return $query;
    }

    public function getArtigoDestaques()
    {
        $query = $this->find()
                    ->select(['titulo', 'slug'])
                    ->where(['Artigos.situation_id =' => 1])
                    ->order(['Artigos.qnt_acesso' => 'DESC'])
                    ->limit(6);
        return $query;
    }

    public function getLisarUltArt()
    {
        $query = $this->find()
                    ->select(['id', 'titulo', 'descricao', 'imagem', 'slug'])
                    ->where(['Artigos.situation_id =' => 1])
                    ->order(['Artigos.id' => 'DESC'])
                    ->limit(3);
        return $query;
    }
}