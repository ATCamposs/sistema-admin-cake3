<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * RedesSocias Controller
 *
 * @property \App\Model\Table\RedesSociasTable $RedesSocias
 *
 * @method \App\Model\Entity\RedesSocia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RedesSociasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations', 'Situations.Colors']
        ];
        $redesSocias = $this->paginate($this->RedesSocias);

        $this->set(compact('redesSocias'));
    }

    /**
     * View method
     *
     * @param string|null $id Redes Socia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $redesSocia = $this->RedesSocias->get($id, [
            'contain' => ['Situations']
        ]);

        $this->set('redesSocia', $redesSocia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $redesSocia = $this->RedesSocias->newEntity();
        if ($this->request->is('post')) {
            $redesSocia = $this->RedesSocias->patchEntity($redesSocia, $this->request->getData());
            if ($this->RedesSocias->save($redesSocia)) {
                $this->Flash->success(__('The redes socia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The redes socia could not be saved. Please, try again.'));
        }
        $situations = $this->RedesSocias->Situations->find('list', ['limit' => 200]);
        $this->set(compact('redesSocia', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Redes Socia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redesSocia = $this->RedesSocias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $redesSocia = $this->RedesSocias->patchEntity($redesSocia, $this->request->getData());
            if ($this->RedesSocias->save($redesSocia)) {
                $this->Flash->success(__('The redes socia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The redes socia could not be saved. Please, try again.'));
        }
        $situations = $this->RedesSocias->Situations->find('list', ['limit' => 200]);
        $this->set(compact('redesSocia', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Redes Socia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $redesSocia = $this->RedesSocias->get($id);
        if ($this->RedesSocias->delete($redesSocia)) {
            $this->Flash->success(__('The redes socia has been deleted.'));
        } else {
            $this->Flash->error(__('The redes socia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
