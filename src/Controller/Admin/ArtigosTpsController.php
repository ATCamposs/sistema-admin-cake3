<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ArtigosTps Controller
 *
 * @property \App\Model\Table\ArtigosTpsTable $ArtigosTps
 *
 * @method \App\Model\Entity\ArtigosTp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtigosTpsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $artigosTps = $this->paginate($this->ArtigosTps);

        $this->set(compact('artigosTps'));
    }

    /**
     * View method
     *
     * @param string|null $id Artigos Tp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artigosTp = $this->ArtigosTps->get($id, [
            'contain' => ['Artigos']
        ]);

        $this->set('artigosTp', $artigosTp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artigosTp = $this->ArtigosTps->newEntity();
        if ($this->request->is('post')) {
            $artigosTp = $this->ArtigosTps->patchEntity($artigosTp, $this->request->getData());
            if ($this->ArtigosTps->save($artigosTp)) {
                $this->Flash->success(__('The artigos tp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artigos tp could not be saved. Please, try again.'));
        }
        $this->set(compact('artigosTp'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Artigos Tp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artigosTp = $this->ArtigosTps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artigosTp = $this->ArtigosTps->patchEntity($artigosTp, $this->request->getData());
            if ($this->ArtigosTps->save($artigosTp)) {
                $this->Flash->success(__('The artigos tp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artigos tp could not be saved. Please, try again.'));
        }
        $this->set(compact('artigosTp'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Artigos Tp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artigosTp = $this->ArtigosTps->get($id);
        if ($this->ArtigosTps->delete($artigosTp)) {
            $this->Flash->success(__('The artigos tp has been deleted.'));
        } else {
            $this->Flash->error(__('The artigos tp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
