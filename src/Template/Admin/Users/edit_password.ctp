<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Senha</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Visualizar'),
        ['controller' => 'Users', 'action' => 'perfil'], 
        ['class' => 'btn btn-outline-primary btn-sm']) ?>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($user) ?>
<div class="form-row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Senha</label>
                <?= $this->Form->control('password', ['class' => 'form-control',
                'placeholder' => 'A senha deve ter no mínimo 6 caracteres', 'label' =>false, 'value' => '']) ?>
                <p>
                    <span class="text-danger">* </span>Campo obrigatório
                </p>
            <div class="text-center">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>