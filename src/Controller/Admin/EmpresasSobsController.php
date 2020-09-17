<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * EmpresasSobs Controller
 *
 * @property \App\Model\Table\EmpresasSobsTable $EmpresasSobs
 *
 * @method \App\Model\Entity\EmpresasSob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpresasSobsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations'],
            'order' => ['EmpresasSobs.ordem' => 'ASC']
        ];
        $empresasSobs = $this->paginate($this->EmpresasSobs);

        $this->set(compact('empresasSobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Empresas Sob id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empresasSob = $this->EmpresasSobs->get($id, [
            'contain' => ['Situations']
        ]);

        $this->set('empresasSob', $empresasSob);
    }

    public function altOrdemEmpresasSob($id = null)
    {   
        $empresasSobsTable = TableRegistry::get('EmpresasSobs');
        $empresasSobsAtual = $empresasSobsTable->getEmpresasSobsAtual($id);
        //var_dump($slideAtual);

        $ordemMenor = $empresasSobsAtual->ordem - 1;
        $empresasSobsMenor = $empresasSobsTable->getEmpresasSobsMenor($ordemMenor);  
        //var_dump($slideMenor);

        if($empresasSobsMenor){
            $empresasSobAtual = $this->EmpresasSobs->newEntity();
            $empresasSobAtual->id = $empresasSobsAtual->id;
            $empresasSobAtual->ordem = $empresasSobsAtual->ordem - 1;
            $this->EmpresasSobs->save($empresasSobAtual);

            $empresasSobMenor = $this->EmpresasSobs->newEntity();
            $empresasSobMenor->id = $empresasSobsMenor->id;
            $empresasSobMenor->ordem = $empresasSobsMenor->ordem + 1;
            $this->EmpresasSobs->save($empresasSobMenor);
            
            $this->Flash->success(__('Alterado a ordem da sobre empresa com sucesso'));
            return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'index']);
        }else{
            $this->Flash->danger(__('Erro: A ordem não foi alterado a ordem do sobre empresa'));
            return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'index']);
        }

        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresasSob = $this->EmpresasSobs->newEntity();
        if ($this->request->is('post')) {

            $empresasSob = $this->EmpresasSobs->patchEntity($empresasSob, $this->request->getData());
            if(!$empresasSob->getErrors()){
                $empresasSob->imagem = $this->EmpresasSobs->uploadSlugImgRed($this->request->getData()['image']['name']);

                $empresasSobTable = TableRegistry::get('EmpresasSobs');
                $ultimoSlide = $empresasSobTable->getUltimoEmpresasSobs();
                $empresasSob->ordem = $ultimoSlide->ordem + 1;


                if ($resultSave = $this->EmpresasSobs->save($empresasSob)) {
                    $id = $resultSave->id; // último id inserido

                    $destino = WWW_ROOT. "files" . DS . "sob_emp" . DS . $id . DS;                
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $empresasSob->imagem;

                    if($this->EmpresasSobs->singleUploadImgRed($imgUpload, $destino, 500, 400)){
                        $this->Flash->success(__('Sobre empresa cadastrado com sucesso'));
                        return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'view', $id]);
                    }else{
                        $this->Flash->warning(__('Erro: Sobre empresa cadastrado com sucesso. Erro ao realizar o upload'));
                    }
                }
            }else{
                $this->Flash->error(__('Erro: Sobre empresa não foi cadastrado com sucesso'));
            } 
        }
        $situations = $this->EmpresasSobs->Situations->find('list', ['limit' => 200]);
        $this->set(compact('empresasSob', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresas Sob id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresasSob = $this->EmpresasSobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresasSob = $this->EmpresasSobs->patchEntity($empresasSob, $this->request->getData());

            if ($this->EmpresasSobs->save($empresasSob)) {
                $this->Flash->success(__('Sobre empresa editado com sucesso'));
                return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('Erro: Sobre empresa não foi editado com sucesso'));
        }
        $situations = $this->EmpresasSobs->Situations->find('list', ['limit' => 200]);
        $this->set(compact('empresasSob', 'situations'));
    }

    public function changeBusinessProfile($id = null)
    {
        $empresasSob = $this->EmpresasSobs->get($id);
        $imagemAntiga = $empresasSob->imagem;

        if($this->request->is(['patch', 'post', 'put'])){
            $empresasSob = $this->EmpresasSobs->newEntity();
            $empresasSob = $this->EmpresasSobs->patchEntity($empresasSob, $this->request->getData());
            if(!$empresasSob->getErrors()){
                $empresasSob->imagem = $this->EmpresasSobs->uploadSlugImgRed($this->request->getData()['image']['name']);
                $empresasSob->id = $id;
                if($this->EmpresasSobs->save($empresasSob)){
                    $destino = WWW_ROOT. "files" . DS . "sob_emp" . DS . $id . DS;                
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $empresasSob->imagem;
                    
                    if($this->EmpresasSobs->singleUploadImgRed($imgUpload, $destino, 500, 400)){
                        $this->EmpresasSobs->deleteProfileImage($destino, $imagemAntiga, $empresasSob->imagem);
                        $this->Flash->success(__('Imagem do sobre empresa editado com sucesso'));
                        return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'view', $id]);
                    }else{
                        $empresasSob->imagem = $imagemAntiga;
                        $this->Users->save($empresasSob);
                        $this->Flash->warning(__('Erro: A imagem não foi editada com sucesso.!'));
                    }
                }else{
                    $this->Flash->danger(__('Erro: A imagem não foi editada com sucesso.'));
                }
            }else{
                $this->Flash->danger(__('Erro: A imagem não foi editada com sucesso.'));
            }          
            
        }  

        $this->set(compact('empresasSob'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresas Sob id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empresasSob = $this->EmpresasSobs->get($id);
        $destino = WWW_ROOT . "files" . DS . "sob_emp" . DS . $empresasSob->id . DS;
        $this->EmpresasSobs->deleteFile($destino);

        $empresasSobTable = TableRegistry::get('EmpresasSobs');
        $listaSlideProx = $empresasSobTable->getEmpresasSobsProx($empresasSob->ordem);
                
        if ($this->EmpresasSobs->delete($empresasSob)) {
            foreach ($listaSlideProx as $slideProx) {
                $empresasSob->ordem = $slideProx->ordem - 1;
                $empresasSob->id = $slideProx->id;
                $this->EmpresasSobs->save($empresasSob);
            }
            $this->Flash->success(__('Sobre empresa apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Sobre empresa não foi apagado com sucesso'));
        }
        return $this->redirect(['action' => 'index']);
    }
}