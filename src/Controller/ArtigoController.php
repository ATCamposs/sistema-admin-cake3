<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Artigo Controller
 *
 * @property \App\Model\Table\UsersTable $Artigo
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtigoController extends AppController
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
    public function view($slug = null)
    {
        $artigoTable = TableRegistry::get('Artigos');
        $artigo = $artigoTable->getVerArtigo($slug);
        if($artigo):
        $artigoAnt = $artigoTable->getArtigoAnt($artigo->id);
        $artigoProx = $artigoTable->getArtigoProx($artigo->id);
        endif;
        $this->set(compact('artigo', 'artigoAnt', 'artigoProx'));
    }

}
