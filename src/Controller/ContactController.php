<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Contact Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactController extends AppController
{
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contatoMsgsTable = TableRegistry::getTableLocator()->get('ContatosMsgs');
        $contatoMsg = $contatoMsgsTable->newEntity();

        if($this->request->is('post')){
            $contatoMsg = $contatoMsgsTable->patchEntity($contatoMsg, $this->request->getData());
            if($contatoMsgsTable->save($contatoMsg)){
                $this->Flash->success(__('Mensagem de contato enviada com Sucesso'));
                return $this->redirect(['view' => 'index']);
            }else{
                $this->Flash->error(__('Mensagem de contato não enviada'));
            }
        }

        $this->set(compact('contatoMsg'));
    }

}
