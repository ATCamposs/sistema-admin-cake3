<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        //adição do behavior upload
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteFile');
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
            ->scalar('name')
            ->maxLength('name', 220)
            ->notEmpty('name');

        $validator
            ->email('email')
            ->notEmpty('email');

        $validator
            ->scalar('username')
            ->maxLength('username', 220)
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 220)
            ->notEmpty('password')
            ->add('password', [
                    'length' => [
                        'rule' => ['minlength', 6],
                        'message' => 'A senha deve ter no mínimo 6 caracteres',
                    ]
            ]);

        $validator
            ->add('image', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'Extensão invalida, use JPG ou PNG',
            ]);

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
        $rules->add($rules->isUnique(['email'], 'Este e-mail já está em uso'));
        $rules->add($rules->isUnique(['username'], 'Usuário já existe'));

        return $rules;
    }

    public function getUserData($user_id)
    {
        $query = $this->find()
                        ->select(['id', 'name', 'email', 'imagem'])
                        ->where([
                            'Users.id' => $user_id
                        ]);
        return $query->first();
    }

    public function confEmail($cod_val_email)
    {
        $query = $this->find()
                        ->select(['id'])
                        ->where([
                        'Users.cod_val_email' => $cod_val_email
                        ]);
        return $query->first();
    }

}
