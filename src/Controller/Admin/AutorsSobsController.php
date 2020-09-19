<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * AutorsSobs Controller
 *
 * @property \App\Model\Table\AutorsSobsTable $AutorsSobs
 *
 * @method \App\Model\Entity\AutorsSob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AutorsSobsController extends AppController
{
    /**
     * Edit method
     *
     * @param string|null $id Autors Sob id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $autorsSob = $this->AutorsSobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $autorsSob = $this->AutorsSobs->patchEntity($autorsSob, $this->request->getData());
            if ($this->AutorsSobs->save($autorsSob)) {
                $this->Flash->success(__('The autors sob has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The autors sob could not be saved. Please, try again.'));
        }
        $situations = $this->AutorsSobs->Situations->find('list', ['limit' => 200]);
        $this->set(compact('autorsSob', 'situations'));
    }
}
