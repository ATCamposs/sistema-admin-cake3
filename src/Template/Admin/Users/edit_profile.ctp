<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Perfil</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Visualizar'),
        ['controller' => 'Users', 'action' => 'profile'], 
        ['class' => 'btn btn-outline-primary btn-sm']) ?>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($user) ?>
<div class="form-row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Nome</label>
                <?= $this->Form->control('name', ['class' => 'form-control',
                'placeholder' => 'Nome completo', 'label' =>false]) ?>
            <label><span class="text-danger">*</span> E-mail</label>
                <?= $this->Form->control('email', ['class' => 'form-control',
                'placeholder' => 'Seu melhor e-mail', 'label' =>false]) ?>
            <label><span class="text-danger">*</span> Usuário</label>
                <?= $this->Form->control('username', ['class' => 'form-control',
                'placeholder' => 'Nome de usuário', 'label' =>false]) ?>
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