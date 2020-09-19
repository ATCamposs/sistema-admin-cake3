<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Contato mailer.
 */
class ContatoMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Contato';

    public function novaMsgContato($msgContato)
    {
        $this->setTo($msgContato->email)
        ->setProfile('Smtp')
        ->setEmailFormat('html')
        ->setTemplate('contato_cliente')
        ->setLayout('contato')
        ->setViewVars(['nome' => $msgContato->nome, 'assunto' => $msgContato->assunto, 'mensagem' => $msgContato->mensagem])
        ->setSubject(sprintf('Mensagem recebida com sucesso'));
    }

    public function novaMsgContatoAdm($msgContato)
    {
        $this->setTo($msgContato->emailAdm)
        ->setProfile('Smtp')
        ->setEmailFormat('html')
        ->setTemplate('contato_adm')
        ->setLayout('contato')
        ->setViewVars(['nome' => $msgContato->nome, 'email' => $msgContato->email, 'assunto' => $msgContato->assunto, 'mensagem' => $msgContato->mensagem])
        ->setSubject(sprintf('Nova Mensagem de Contato'));
    }
}
