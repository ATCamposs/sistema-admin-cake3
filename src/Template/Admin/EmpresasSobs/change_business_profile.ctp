<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Imagem do Sobre Empresa</h2>
    </div>
        <div class="p-2">
            <span class="d-none d-md-block">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Carousels', 'action' => 'view', $empresasSob->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Carousels', 'action' => 'delete', $empresasSob->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o sobre empresa # {0}?', $empresasSob->id)]) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('Listar'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Carousels', 'action' => 'view', $empresasSob->id], ['class' => 'dropdown-item']) ?>

                    <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Carousels', 'action' => 'delete', $empresasSob->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar o sobre empresa # {0}?', $empresasSob->id)]) ?>                                    
                </div>
            </div>
        </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($empresasSob, ['enctype' => 'multipart/form-data']) ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Foto (500x400)</label>
        <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'onchange'=>'previewImage()']) ?>
    </div>

    <div class="form-group col-md-6">
        <?php
        if(($empresasSob->imagem !== null) OR (!empty($empresasSob->imagem))){
            $imagem_antiga = '../../../files/sob_emp/'.$empresasSob->id.'/'.$empresasSob->imagem;
        }else{
            $imagem_antiga = '../../../files/sob_emp/preview_img.jpg';
        }
        ?>

        <img src='<?= $imagem_antiga ?>' alt='<?= $empresasSob->name ?>' id='preview-img' class='img-thumbnail' style="width: 250px; height: 200px;">
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>