<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Usuário</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
            <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
            <?= $this->Html->link(__('Editar Senha'), ['controller' => 'Users', 'action' => 'adminEditPassword', $user->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o usuário: {0}?', $user->name)]) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'dropdown-item']) ?>
                <?= $this->Html->link(__('Editar Senha'), ['controller' => 'Users', 'action' => 'adminEditPassword', $user->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar o usuário # {0}?', $user->id)]) ?>                                    
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">Imagem</dt>
    <dd class="col-sm-9">
        <div class="img-profile">
            <?php
            if(!empty($user->imagem)){
                $imagem_usuario = $this->Html->image('../files/user/' . $user->id . '/' . $user->imagem, ['class' => 'rounded-circle', 'width' => 120, 'height' => 120]) ?>
            <div class="edit">
            <?= $this->Html->link(
                "<i class='fas fa-pencil-alt'></i>",
                [
                    'controller' => 'Users',
                    'action' => 'changePictureUser',
                    $user->id
                ],
                [
                    'escape' => false
                ]
                );?>
            </div>
            <?php
            } else {
                $imagem_usuario = $this->Html->image('../files/user/logo-gato.png', ['class' => 'rounded-circle', 'width' => 120, 'height' => 120]);
            }
            ?>
            <?= $imagem_usuario ?>
        </div>
    </dd>
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($user->id) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($user->name) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($user->email) ?></dd>

    <dt class="col-sm-3">Usuário</dt>
    <dd class="col-sm-9"><?= h($user->username) ?></dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($user->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($user->modified) ?></dd>
</dl>
