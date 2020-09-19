<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Artigos</h2>
    </div>
        <div class="p-2">
            <?= $this->Html->link(__('Cadastrar'),['controller' => 'Artigos','action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']);
            ?>
        </div>
</div>
<?= $this->Flash->render() ?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th class="d-none d-lg-table-cell">Situação</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artigos as $artigo): ?>
                <tr>
                    <td><?= $this->Number->format($artigo->id) ?></td>
                    <td><?= h($artigo->titulo) ?></td>

                    <td class="d-none d-lg-table-cell">  
                        <?php echo "<span class='badge badge-".$artigo->situation->color->cor."'>".$artigo->situation->nome_situacao."</span>"; ?>            
                    </td>

                    <td>
                        <span class="d-none d-md-block">
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Artigos', 'action' => 'view', $artigo->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                            <?= $this->Html->link(__('Editar'), ['controller' => 'Artigos', 'action' => 'edit', $artigo->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Artigos', 'action' => 'delete', $artigo->id], ['class' =>'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o artigo # {0}?', $artigo->id)]) ?>
                        </span>  
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Artigos', 'action' => 'view', $artigo->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Html->link(__('Editar'), ['controller' => 'Artigos', 'action' => 'edit', $artigo->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Artigos', 'action' => 'delete', $artigo->id], ['class' =>'dropdown-item', 'confirm' => __('Relamente deseja apagar o artigo # {0}?', $artigo->id)]) ?>
                            </div>
                        </div>                         
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->element('pagination'); ?>
</div>