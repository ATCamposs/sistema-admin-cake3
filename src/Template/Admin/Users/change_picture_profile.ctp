<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Foto</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Visualizar'),
        ['controller' => 'Users', 'action' => 'profile'], 
        ['class' => 'btn btn-outline-primary btn-sm']) ?>
    </div>
    <div class="dropdown d-block d-md-none">
        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ações
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class' => 'dropdown-item']) ?>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
<div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Foto</label>
                <?= $this->Form->file('imagem', ['class' => 'form-control',
                'label' =>false]) ?>
        <p>
            <span class="text-danger">* </span>Campo obrigatório
        </p>
<div class="text-center">
    <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
</div>

<?= $this->Form->end() ?>