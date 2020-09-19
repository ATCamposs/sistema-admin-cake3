<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Rede Social</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'RedesSocias', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'RedesSocias', 'action' => 'edit', $redesSocia->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'RedesSocias', 'action' => 'delete', $redesSocia->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar a rede social # {0}?', $redesSocia->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'RedesSocias', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'RedesSocias', 'action' => 'edit', $redesSocia->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'RedesSocias', 'action' => 'delete', $redesSocia->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar a rede social # {0}?', $redesSocia->id)]) ?>                                    
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($redesSocia->id) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($redesSocia->titulo) ?></dd>

    <dt class="col-sm-3">Link</dt>
    <dd class="col-sm-9"><?= h($redesSocia->link) ?></dd>

    <dt class="col-sm-3">Ícone</dt>
    <dd class="col-sm-9"><i class="<?= h($redesSocia->icone) ?>"></i></dd>

    <dt class="col-sm-3">Situação</dt>
    <dd class="col-sm-9">
        <?php echo "<span class='badge badge-".$redesSocia->situation->color->cor."'>".$redesSocia->situation->nome_situacao."</span>"; ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($redesSocia->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($redesSocia->modified) ?></dd>

</dl>
