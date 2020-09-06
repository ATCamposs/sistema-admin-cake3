<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';

    public function userDataRegistry($user)
    {
        
        $$this->setTo($user->email)
        ->setProfile('Smtp')
        ->setEmailFormat('html')
        ->setTemplate('welcome')
        ->setLayout('user')
        ->setViewVars(['name' => $user->name])
        ->setSubject('Usuário cadastrado com Sucesso');
    }
    
}
