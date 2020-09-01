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
    <div class='form-row'>
        <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Foto ( 150 x 150 )</label>
            <?= $this->Form->file('imagem', [
            'label' =>false, 'onchange'=>'previewImage()']) ?>
        </div>
        <div class="form-group col-md-6">
            <?php
                if(!!$user->imagem){
                    $old_image = '../../files/user/'.$user->id.'/'.$user->imagem;
                }else{
                    $old_image = '../../files/user/logo-gato.png';
                }
            ?>
            <img src='<?= $old_image ?>' alt='<?= $user->name ?>' class='img-thumbnail' id='preview-img' style='width: 150px; height: 150px;'>
        </div>
    </div>

        <p>
            <span class="text-danger">* </span>Campo obrigatório
        </p>
<div class="text-center">
    <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
</div>

<?= $this->Form->end() ?>