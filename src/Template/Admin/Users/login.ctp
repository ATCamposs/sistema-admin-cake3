<?= $this->Form->create('post', ['class' => 'form-signin']) ?>
<?= $this->Html->image('logo-gato.png', ['class' => 'mb-4', 'alt' => 'Logo Gato', 'width' => '144', 'height' => '144']) ?>

<h1 class="h3 mb-3 font-weight-normal">Área Restrita</h1>

<?= $this->Flash->render(); ?>

    <div class="form-group">
    <label>Usuário</label>
        <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Digite o usuário', 'label' => false]);
        ?>
    </div>
    <div class="form-group">
    <label>Senha</label>
        <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Digite a senha', 'label' => false]);?>
    </div>
    <?= $this->Form->button(__('Acessar'), ['class' => 'btn btn-primary']) ?>

    <p class="text-center">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'Users', 'action' => 'cadastrar']) ?> -
    Esqueceu sua senha ?</p>
    
<?= $this->Form->end() ?>
