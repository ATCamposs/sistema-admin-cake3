<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Usuário</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'editProfile'], ['class' => 'btn btn-outline-warning btn-sm']) ?>
            <?= $this->Html->link(__('Editar senha'), ['controller' => 'Users', 'action' => 'editPassword'], ['class' => 'btn btn-outline-danger btn-sm']) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'editProfile'], ['class' => 'dropdown-item']) ?>                                 
                <?= $this->Html->link(__('Editar senha'), ['controller' => 'Users', 'action' => 'editPassword'], ['class' => 'dropdown-item']) ?>  
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Imagem</dt>
    <dd class="col-sm-9">
    <?php
    if(!empty($perfilUser['imagem'])){
        $imagem_usuario = $this->Html->image('../files/user/' . $perfilUser['id'] . '/' . $perfilUser['imagem'], ['class' => 'rounded-circle', 'width' => 120, 'height' => 120]);
    } else {
        $imagem_usuario = $this->Html->image('../files/user/logo-gato.png');
    }
    echo $imagem_usuario;

    echo $this->Html->link(__('Alterar Foto'), ['action' => 'changePicturePerfil'], ['class' => 'btn btn-outline-primary btn-sm'])
    ?>
    </dd>
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($user['id']) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($user['name']) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($user['email']) ?></dd>

    <dt class="col-sm-3">Usuário</dt>
    <dd class="col-sm-9"><?= h($user['username']) ?></dd>

</dl>
