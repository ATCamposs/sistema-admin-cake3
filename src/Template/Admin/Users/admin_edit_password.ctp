<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Senha</h2>
    </div>
    <div class="p-2">
            <?= $this->Html->link(__('Listar'),
            ['controller' => 'Users', 'action' => 'index'], 
            ['class' => 'btn btn-outline-info btn-sm']) ?>
            <?= $this->Html->link(__('Visualizar'),
            ['controller' => 'Users', 'action' => 'view', $user->id], 
            ['class' => 'btn btn-outline-primary btn-sm']) ?>
            <?= $this->Form->postLink(__('Apagar'),
            ['controller' => 'Users', 'action' => 'delete', $user->id], 
            ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar o usuário: {0} ?', $user->name)]) ?>
    </div>
    <div class="dropdown d-block d-md-none">
        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ações
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
        <?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'dropdown-item']) ?>
        <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente Deseja apagar o usuário: {0} ?', $user->id)]) ?>
        </div>
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