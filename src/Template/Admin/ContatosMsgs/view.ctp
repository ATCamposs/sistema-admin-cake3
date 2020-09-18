<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Mensagem de Contato</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'ContatosMsgs', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'ContatosMsgs', 'action' => 'edit', $contatosMsg->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'ContatosMsgs', 'action' => 'delete', $contatosMsg->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar a mensagem de contato # {0}?', $contatosMsg->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'ContatosMsgs', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'ContatosMsgs', 'action' => 'edit', $contatosMsg->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'ContatosMsgs', 'action' => 'delete', $contatosMsg->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar a mensagem de contato # {0}?', $contatosMsg->id)]) ?>                                    
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($contatosMsg->id) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($contatosMsg->nome) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($contatosMsg->email) ?></dd>

    <dt class="col-sm-3">Assunto</dt>
    <dd class="col-sm-9"><?= h($contatosMsg->assunto) ?></dd>

    <dt class="col-sm-3">Mensagem</dt>
    <dd class="col-sm-9"><?= h($contatosMsg->mensagem) ?></dd>

    <dt class="col-sm-3">Usuário</dt>
    <dd class="col-sm-9"><?= $contatosMsg->has('user') ? $this->Html->link($contatosMsg->user->name, ['controller' => 'Users', 'action' => 'view', $contatosMsg->user->id]) : '' ?></dd>

    <dt class="col-sm-3">Situação</dt>
    <dd class="col-sm-9"><?php echo "<span class='badge badge-".$contatosMsg->conts_msgs_sit->color->cor."'>"
                        .$contatosMsg->conts_msgs_sit->nome_sit_msg_cont."</span>";?> </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($contatosMsg->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($contatosMsg->modified) ?></dd>

</dl>