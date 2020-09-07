<?= $this->Form->create($user, ['class' => 'form-signin']) ?>

<h1 class="h3 mb-3 font-weight-normal">Alterar Senha</h1>

<?= $this->Flash->render(); ?>

    <div class="form-group">
    <label>Senha</label>
        <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Digite a senha', 'label' => false]);?>
    </div>
    <div>
    <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning btn-block']) ?>
    </div>
    <p class="text-center">
    <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?> -
    Esqueceu sua senha ?</p>
    
<?= $this->Form->end() ?>
