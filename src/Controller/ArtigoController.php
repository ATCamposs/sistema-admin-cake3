<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

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
            $expression = new QueryExpression('qnt_acesso = qnt_acesso + 1');
            $artigoTable->updateAll([$expression], ['Artigos.id' => $artigo->id]);
        endif;
        $artigoUltimos = $artigoTable->getArtigoUltimos();
        $artigoDestaques = $artigoTable->getartigoDestaques();
        $autorSobTable = TableRegistry::get('AutorsSobs');
        $autorSob = $autorSobTable->getVerSobAutor();
        $this->set(compact('artigo', 'artigoAnt', 'artigoProx', 'artigoUltimos', 'artigoDestaques', 'autorSob'));
    }

}
