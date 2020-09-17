<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Serviços</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Editar'), ['controller' => 'Servicos', 'action' => 'edit', $servico->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Editar'), ['controller' => 'Servicos', 'action' => 'edit', $servico->id], ['class' => 'dropdown-item']) ?>               
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($servico->id) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($servico->titulo_ser) ?></dd>

    <dt class="col-sm-3">Ícone um</dt>
    <dd class="col-sm-9"><i class='<?= h($servico->icone_um) ?>'></i> - <?= h($servico->icone_um) ?></dd>

    <dt class="col-sm-3">Titulo um</dt>
    <dd class="col-sm-9"><?= h($servico->titulo_um) ?></dd>

    <dt class="col-sm-3">Descrição um</dt>
    <dd class="col-sm-9"><?= h($servico->descricao_um) ?></dd>

    <dt class="col-sm-3">Ícone dois</dt>
    <dd class="col-sm-9"><i class='<?= h($servico->icone_dois) ?>'></i> - <?= h($servico->icone_dois) ?></dd>

    <dt class="col-sm-3">Titulo dois</dt>
    <dd class="col-sm-9"><?= h($servico->titulo_dois) ?></dd>

    <dt class="col-sm-3">Descrição dois</dt>
    <dd class="col-sm-9"><?= h($servico->descricao_dois) ?></dd>

    <dt class="col-sm-3">Ícone três</dt>
    <dd class="col-sm-9"><i class='<?= h($servico->icone_tres) ?>'></i> - <?= h($servico->icone_tres) ?></dd>

    <dt class="col-sm-3">Titulo três</dt>
    <dd class="col-sm-9"><?= h($servico->titulo_tres) ?></dd>

    <dt class="col-sm-3">Descrição três</dt>
    <dd class="col-sm-9"><?= h($servico->descricao_tres) ?></dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($servico->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($servico->modified) ?></dd>

</dl>