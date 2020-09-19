<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Sobre Autor</h2>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($autorsSob) ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Titulo</label>
        <?= $this->Form->control('titulo', ['class' => 'form-control', 'placeholder' => 'Titulo do Sobre Autor', 'label' => false]) ?>
    </div> 
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Situação</label>
        <?= $this->Form->control('situation_id', ['options' => $situations, 'class' => 'form-control', 'label' => false]) ?>        
    </div> 
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Descrição</label>
        <?= $this->Form->control('descricao', ['class' => 'form-control', 'id' => 'editor-um', 'placeholder' => 'Descrição do Sobre Autor', 'label' => false]) ?>
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>

<?= $this->element('editor') ?>