<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Usuário</h2>
    </div>
        <div class="p-2">
            <?= $this->Html->link(__('Listar'),
            ['controller' => 'users', 'action' => 'index'], 
            ['class' => 'btn btn-outline-info btn-sm']) ?>
        </div>
    </a>
</div><hr>
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
            <label><span class="text-danger">*</span> Senha</label>
                <?= $this->Form->control('password', ['class' => 'form-control',
                'placeholder' => 'Sua senha', 'label' =>false]) ?>
                <p>
                    <span class="text-danger">* </span>Campo obrigatório
                </p>
            <div class="text-center">
                <?= $this->Form->button(__('Cadastrar'), ['class' => 'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>