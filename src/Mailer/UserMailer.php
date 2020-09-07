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
        
        $this->setTo($user->email)
        ->setProfile('Smtp')
        ->setEmailFormat('html')
        ->setTemplate('welcome')
        ->setLayout('user')
        ->setViewVars(['name' => $user->name, 'cod_val_email' => $user->cod_val_email, 'host_name' => $user->host_name])
        ->setSubject('Usuário cadastrado com Sucesso');
    }
    
    public function recoveryPassword($user)
    {
        $this->setTo($user->email)
        ->setProfile('Smtp')
        ->setEmailFormat('html')
        ->setTemplate('recovery_pass')
        ->setLayout('user')
        ->setViewVars(['name' => $user->name, 'username' => $user->username, 'host_name' => $user->host_name, 'recovery_password' => $user->recovery_password])
        ->setSubject('Recuperar senha');
    }

}
