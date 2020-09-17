<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Vídeos</h2>
    </div>
        <div class="p-2">
            <span class="d-none d-md-block">
                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Depoimentos', 'action' => 'view', $depoimento->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Depoimentos', 'action' => 'view', $depoimento->id], ['class' => 'dropdown-item']) ?>                              
                </div>
            </div>
        </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($depoimento) ?>
<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Titulo</label>
        <?= $this->Form->control('nome_dep', ['class' => 'form-control', 'placeholder' => 'Titulo da Área de Vídeo', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Descrição</label>
        <?= $this->Form->control('descricao_dep', ['class' => 'form-control', 'placeholder' => 'Descrição do Depoimento', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Vídeo Um</label>
        <?= $this->Form->control('video_um', ['class' => 'form-control', 'placeholder' => 'Vídeo um', 'label' => false]) ?>
    </div> 
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Vídeo Dois</label>
        <?= $this->Form->control('video_dois', ['class' => 'form-control', 'placeholder' => 'Vídeo dois', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Vídeo Três</label>
        <?= $this->Form->control('video_tres', ['class' => 'form-control', 'placeholder' => 'Vídeo três', 'label' => false]) ?>
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>