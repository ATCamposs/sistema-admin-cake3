<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Serviços</h2>
    </div>
        <div class="p-2">
            <span class="d-none d-md-block">
                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Servicos', 'action' => 'view', $servico->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Servicos', 'action' => 'view', $servico->id], ['class' => 'dropdown-item']) ?>                              
                </div>
            </div>
        </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($servico) ?>
<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Titulo</label>
        <?= $this->Form->control('titulo_ser', ['class' => 'form-control', 'placeholder' => 'Titulo da Área de Serviços', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Ícone Um</label>
        <?= $this->Form->control('icone_um', ['class' => 'form-control', 'placeholder' => 'Ícone do serviço um', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Titulo Um</label>
        <?= $this->Form->control('titulo_um', ['class' => 'form-control', 'placeholder' => 'Titulo do serviço um', 'label' => false]) ?>
    </div>   
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Descrição Um</label>
        <?= $this->Form->control('descricao_um', ['class' => 'form-control', 'placeholder' => 'Descrição do serviço um', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Ícone Dois</label>
        <?= $this->Form->control('icone_dois', ['class' => 'form-control', 'placeholder' => 'Ícone do serviço dois', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Titulo Dois</label>
        <?= $this->Form->control('titulo_dois', ['class' => 'form-control', 'placeholder' => 'Titulo do serviço dois', 'label' => false]) ?>
    </div>   
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Descrição Dois</label>
        <?= $this->Form->control('descricao_dois', ['class' => 'form-control', 'placeholder' => 'Descrição do serviço dois', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Ícone Três</label>
        <?= $this->Form->control('icone_tres', ['class' => 'form-control', 'placeholder' => 'Ícone do serviço três', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Titulo Três</label>
        <?= $this->Form->control('titulo_tres', ['class' => 'form-control', 'placeholder' => 'Titulo do serviço três', 'label' => false]) ?>
    </div>   
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Descrição Três</label>
        <?= $this->Form->control('descricao_tres', ['class' => 'form-control', 'placeholder' => 'Descrição do serviço três', 'label' => false]) ?>
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>