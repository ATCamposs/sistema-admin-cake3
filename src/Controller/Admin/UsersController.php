<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['cadastrar', 'logout', 'confEmail', 'recoveryPassword']);
    }

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

    public function recoveryPassword()
    {
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $userTable = TableRegistry::get('Users');
            $recoveryPass = $userTable->getRecoveryPassword($this->request->getData()['email']);

            if($recoveryPass){

                if(!$recoveryPass->recovery_password){
                    $user->id = $recoveryPass->id;
                    $user->recovery_password = Security::hash($this->request->getData()['email'] . $recoveryPass->id, 'sha256', false);
                    $userTable->save($user);
                    $recoveryPass->recovery_password = $user->recovery_password;
                }
                $recoveryPass->host_name = Router::fullBaseUrl().$this->request->getAttribute('webroot').$this->request->getParam('prefix');
                $this->getMailer('User')->send('recoveryPassword', [$recoveryPass]);

                $this->Flash->success(__('Email enviado com sucesso'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }else{
                $this->Flash->danger(__('Nenhum usuário encontrado com este e-mail'));
            }
        }
        $this->set(compact('user'));
    }

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
                    $this->Users->deleteProfileImage($destine, $old_image, $user->imagem);
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
            $user->imagem = $this->Users->uploadSlugImgRed($this->request->getData()['image']['name']);
            $user->id = $id;

            $user = $this->Users->patchEntity($user, $this->request->getdata());
            if($this->Users->save($user)){
                $destine = WWW_ROOT.'files/user/'.$id.'/';
                $imgUpload = $this->request->getData()['image'];
                $imgUpload['name'] = $user->imagem;

                if($user->imagem = $this->Users->singleUploadImgRed($imgUpload, $destine, 150, 150)){
                    $this->Users->deleteProfileImage($destine, $old_image, $user->imagem);
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
        $destine = WWW_ROOT.'files/user/'.$user->id.'/';

        $this->Users->deleteFile($destine);

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

    use MailerAwareTrait;
    public function cadastrar()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->cod_val_email = Security::hash($this->request->getData('password') . $this->request->getData('email'), 'sha256', false);
            if ($this->Users->save($user)) {
                $user->host_name = Router::fullBaseUrl() . $this->request->getAttribute('webroot') . $this->request->getParam('prefix');

                $this->getMailer('User')->send('userDataRegistry', [$user]);

                $this->Flash->success(__('Usuário cadastrado com sucesso.'));

                return $this->redirect(['controller' =>'Users', 'action' => 'login']);
            }
            $this->Flash->danger(__('ERRO: O usuário não pode ser salvo.'));
        }
        $this->set(compact('user'));
    }

    public function confEmail($cod_val_email = null)
    {
        $userTable = TableRegistry::get('Users');
        $confEmail =  $userTable->getConfEmail($cod_val_email);
        if($confEmail){
            $user = $this->Users->newEntity();
            $user->id = $confEmail->id;
            $user->email_val = 1;
            if($userTable->save($user)){
                $this->Flash->success(__('E-mail confirmado com sucesso.'));
                return $this->redirect(['controller' =>'Users', 'action' => 'login']);
            }else{
                $this->Flash->danger(__('ERRO: Confirmação não pode ser executada.'));
                return $this->redirect(['controller' =>'Users', 'action' => 'login']);    
            }
        }else{
            $this->Flash->danger(__('ERRO: E-mail não confirmado.'));
            return $this->redirect(['controller' =>'Users', 'action' => 'login']);
        }
    }

}
