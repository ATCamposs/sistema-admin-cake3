<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Vídeos</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Editar'), ['controller' => 'Depoimentos', 'action' => 'edit', $depoimento->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Editar'), ['controller' => 'Depoimentos', 'action' => 'edit', $depoimento->id], ['class' => 'dropdown-item']) ?>               
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($depoimento->id) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($depoimento->nome_dep) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($depoimento->descricao_dep) ?></dd>

    <dt class="col-sm-3">Vídeo Um</dt>
    <dd class="col-sm-9"><?= $depoimento->video_um ?></dd>

    <dt class="col-sm-3">Vídeo dois</dt>
    <dd class="col-sm-9"><?= $depoimento->video_dois ?></dd>

    <dt class="col-sm-3">Vídeo três</dt>
    <dd class="col-sm-9"><?= $depoimento->video_tres ?></dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($depoimento->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($depoimento->modified) ?></dd>

</dl>