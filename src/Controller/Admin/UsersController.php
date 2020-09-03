<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 40
        ];

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'));

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('ERRO: O usuário não pode ser salvo.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário editado com sucesso.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $id]);
            }
            $this->Flash->danger(__('ERRO: Alterações não puderam ser salvas.'));
        }
        $this->set(compact('user'));
    }

    public function adminEditPassword($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha do usuário editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('ERRO: Alterações não puderam ser salvas.'));
        }
        $this->set(compact('user'));
    }

    public function editProfile()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Perfil editado com sucesso.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
            }
            $this->Flash->danger(__('ERRO: Alterações não puderam ser salvas.'));
        }

        $this->set(compact('user'));
    }

    public function editPassword()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha editada com sucesso.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
            }
            $this->Flash->danger(__('ERRO: Alterações não puderam ser salvas.'));
        }

        $this->set(compact('user'));
    }
    //UPLOAD QUE NAO REDIMENSIONA IMAGENS
    /*public function changePictureProfile()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);
        $old_image = $user->imagem;

        if($this->request->is(['patch', 'post', 'put'])){
            $user = $this->Users->newEntity();
            $user->imagem = $this->Users->uploadSlug($this->request->getData()['image']['name']);
            $user->id = $user_id;

            $user = $this->Users->patchEntity($user, $this->request->getdata());
            if($this->Users->save($user)){
                $destine = WWW_ROOT.'files/user/'.$user_id.'/';
                $imgUpload = $this->request->getData()['image'];
                $imgUpload['name'] = $user->imagem;

                if($user->imagem = $this->Users->singleUpload($imgUpload, $destine)){
                    if((!!$old_image) &&  ($old_image != $user->imagem)){
                        unlink($destine.$old_image);
                    }
                        $this->Flash->success(__('Imagem atualizada com sucesso.'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
                }else{
                    $user->imagem = $old_image;
                    $this->Users->save($user);
                    $this->Flash->danger(__('Erro: Imagem com o mesmo nome.'));
                }
            }else{
                $this->Flash->danger(__('Erro: Use imagens JPEG ou PNG.'));
            }
        }
        $this->set(compact('user'));
    }*/

    public function changePictureProfile()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);
        $old_image = $user->imagem;

        if($this->request->is(['patch', 'post', 'put'])){
            $user = $this->Users->newEntity();
            $user->imagem = $this->Users->uploadSlugImgRed($this->request->getData()['image']['name']);
            $user->id = $user_id;

            $user = $this->Users->patchEntity($user, $this->request->getdata());
            if($this->Users->save($user)){
                $destine = WWW_ROOT.'files/user/'.$user_id.'/';
                $imgUpload = $this->request->getData()['image'];
                $imgUpload['name'] = $user->imagem;

                if($user->imagem = $this->Users->singleUploadImgRed($imgUpload, $destine, 150, 150)){
                    if((!!$old_image) &&  ($old_image != $user->imagem)){
                        unlink($destine.$old_image);
                    }
                        $this->Flash->success(__('Imagem atualizada com sucesso.'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
                }else{
                    $user->imagem = $old_image;
                    $this->Users->save($user);
                    $this->Flash->danger(__('Erro: Imagem com o mesmo nome.'));
                }
            }else{
                $this->Flash->danger(__('Erro: Use imagens JPEG ou PNG.'));
            }
        }
        $this->set(compact('user'));
    }

    public function changePictureUser($id = null)
    {
        $user = $this->Users->get($id);
        $old_image = $user->imagem;

        if($this->request->is(['patch', 'post', 'put'])){
            $user = $this->Users->newEntity();
            $user->imagem = $this->Users->uploadSlug($this->request->getData()['image']['name']);
            $user->id = $id;

            $user = $this->Users->patchEntity($user, $this->request->getdata());
            if($this->Users->save($user)){
                $destine = WWW_ROOT.'files/user/'.$id.'/';
                $imgUpload = $this->request->getData()['image'];
                $imgUpload['name'] = $user->imagem;

                if($user->imagem = $this->Users->singleUpload($imgUpload, $destine)){
                    if((!!$old_image) &&  ($old_image != $user->imagem)){
                        unlink($destine.$old_image);
                    }
                        $this->Flash->success(__('Imagem atualizada com sucesso.'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'view', $id]);
                }else{
                    $user->imagem = $old_image;
                    $this->Users->save($user);
                    $this->Flash->danger(__('Erro: Imagem com o mesmo nome.'));
                }
            }else{
                $this->Flash->danger(__('Erro: Use imagens JPEG ou PNG.'));
            }
        }
        $this->set(compact('user'));
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário deletado com sucesso.'));
        } else {
            $this->Flash->danger(__('ERRO: o usuário não pode ser deletado.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->danger(__('Usuário ou senha inválidos.'));
            }
        }
    }

    public function logout()
    {
        $this->Flash->success(__('Deslogado com sucesso.'));
        return $this->redirect($this->Auth->logout());
    }
}
