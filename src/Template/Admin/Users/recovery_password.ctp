<?= $this->Form->create($user, ['class' => 'form-signin']) ?>

<h1 class="h3 mb-3 font-weight-normal">Recuperar senha</h1>

<?= $this->Flash->render(); ?>

    <div class="form-group">
    <label>E-mail</label>
        <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'E-mail', 'label' => false]);
        ?>
    </div>

    <?= $this->Form->button(__('Recuperar senha'), ['class' => 'btn btn-warning']) ?>

    <p class="text-center">
    <?= $this->Html->link(__('Clique aqui para acessar'), ['controller' => 'Users', 'action' => 'login']) ?>
    </p>
    
<?= $this->Form->end() ?>
