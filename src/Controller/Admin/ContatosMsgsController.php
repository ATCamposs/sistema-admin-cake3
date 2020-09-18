<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ContatosMsgs Controller
 *
 * @property \App\Model\Table\ContatosMsgsTable $ContatosMsgs
 *
 * @method \App\Model\Entity\ContatosMsg[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContatosMsgsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ContsMsgsSits', 'ContsMsgsSits.Colors']
        ];
        $contatosMsgs = $this->paginate($this->ContatosMsgs);

        $this->set(compact('contatosMsgs'));
    }

    /**
     * View method
     *
     * @param string|null $id Contatos Msg id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contatosMsg = $this->ContatosMsgs->get($id, [
            'contain' => ['Users', 'ContsMsgsSits', 'ContsMsgsSits.Colors']
        ]);

        $this->set('contatosMsg', $contatosMsg);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contatosMsg = $this->ContatosMsgs->newEntity();
        if ($this->request->is('post')) {
            $contatosMsg = $this->ContatosMsgs->patchEntity($contatosMsg, $this->request->getData());
            if ($resultSave = $this->ContatosMsgs->save($contatosMsg)) {
                $id = $resultSave->id;
                $this->Flash->success(__('The contatos msg has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The contatos msg could not be saved. Please, try again.'));
        }
        $users = $this->ContatosMsgs->Users->find('list', ['limit' => 200]);
        $contsMsgsSits = $this->ContatosMsgs->ContsMsgsSits->find('list', ['limit' => 200]);
        $this->set(compact('contatosMsg', 'users', 'contsMsgsSits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contatos Msg id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contatosMsg = $this->ContatosMsgs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contatosMsg = $this->ContatosMsgs->patchEntity($contatosMsg, $this->request->getData());
            if ($this->ContatosMsgs->save($contatosMsg)) {
                $this->Flash->success(__('The contatos msg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contatos msg could not be saved. Please, try again.'));
        }
        $users = $this->ContatosMsgs->Users->find('list', ['limit' => 200]);
        $contsMsgsSits = $this->ContatosMsgs->ContsMsgsSits->find('list', ['limit' => 200]);
        $this->set(compact('contatosMsg', 'users', 'contsMsgsSits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contatos Msg id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contatosMsg = $this->ContatosMsgs->get($id);
        if ($this->ContatosMsgs->delete($contatosMsg)) {
            $this->Flash->success(__('The contatos msg has been deleted.'));
        } else {
            $this->Flash->error(__('The contatos msg could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
