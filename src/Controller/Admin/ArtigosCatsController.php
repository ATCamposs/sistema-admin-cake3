<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ArtigosCats Controller
 *
 * @property \App\Model\Table\ArtigosCatsTable $ArtigosCats
 *
 * @method \App\Model\Entity\ArtigosCat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtigosCatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations']
        ];
        $artigosCats = $this->paginate($this->ArtigosCats);

        $this->set(compact('artigosCats'));
    }

    /**
     * View method
     *
     * @param string|null $id Artigos Cat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artigosCat = $this->ArtigosCats->get($id, [
            'contain' => ['Situations', 'Artigos']
        ]);

        $this->set('artigosCat', $artigosCat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artigosCat = $this->ArtigosCats->newEntity();
        if ($this->request->is('post')) {
            $artigosCat = $this->ArtigosCats->patchEntity($artigosCat, $this->request->getData());
            if ($this->ArtigosCats->save($artigosCat)) {
                $this->Flash->success(__('The artigos cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artigos cat could not be saved. Please, try again.'));
        }
        $situations = $this->ArtigosCats->Situations->find('list', ['limit' => 200]);
        $this->set(compact('artigosCat', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Artigos Cat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artigosCat = $this->ArtigosCats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artigosCat = $this->ArtigosCats->patchEntity($artigosCat, $this->request->getData());
            if ($this->ArtigosCats->save($artigosCat)) {
                $this->Flash->success(__('The artigos cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artigos cat could not be saved. Please, try again.'));
        }
        $situations = $this->ArtigosCats->Situations->find('list', ['limit' => 200]);
        $this->set(compact('artigosCat', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Artigos Cat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artigosCat = $this->ArtigosCats->get($id);
        if ($this->ArtigosCats->delete($artigosCat)) {
            $this->Flash->success(__('The artigos cat has been deleted.'));
        } else {
            $this->Flash->error(__('The artigos cat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
