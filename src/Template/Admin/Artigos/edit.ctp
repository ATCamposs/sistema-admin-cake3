<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Artigo</h2>
    </div>
        <div class="p-2">
            <span class="d-none d-md-block">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Artigos', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Artigos', 'action' => 'view', $artigo->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Artigos', 'action' => 'delete', $artigo->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o artigo # {0}?', $artigo->id)]) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('Listar'), ['controller' => 'Artigos', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Artigos', 'action' => 'view', $artigo->id], ['class' => 'dropdown-item']) ?>

                    <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Artigos', 'action' => 'delete', $artigo->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar o artigo # {0}?', $artigo->id)]) ?>                                    
                </div>
            </div>
        </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($artigo, ['enctype' => 'multipart/form-data']) ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Titulo</label>
        <?= $this->Form->control('titulo', ['class' => 'form-control', 'placeholder' => 'Titulo do Artigo', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Categoria</label>
        <?= $this->Form->control('artigos_cat_id', ['options' => $artigosCats, 'class' => 'form-control', 'label' => false]) ?> 
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Descrição</label>
        <?= $this->Form->control('descricao', ['class' => 'form-control', 'placeholder' => 'Descrição do artigo', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Conteúdo</label>
        <?= $this->Form->control('conteudo', ['class' => 'form-control', 'placeholder' => 'Conteúdo do artigo', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Resumo Público</label>
        <?= $this->Form->control('resumo_publico', ['class' => 'form-control', 'placeholder' => 'Resumo Público para artigos privados', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Slug</label>
        <?= $this->Form->control('slug', ['class' => 'form-control', 'placeholder' => 'Slug do artigo apresentado na URL', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Palavra Chave</label>
        <?= $this->Form->control('keywords', ['class' => 'form-control', 'placeholder' => 'Palavra chave do artigo', 'label' => false]) ?>
    </div>  
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Descrição SEO</label>
        <?= $this->Form->control('description', ['class' => 'form-control', 'placeholder' => 'Descrição do artigo para SEO', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Situação Buscadores</label>
        <?= $this->Form->control('robot_id', ['options' => $robots, 'class' => 'form-control', 'label' => false]) ?>        
    </div>  
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Tipo do Artigo</label>
        <?= $this->Form->control('artigos_tp_id', ['options' => $artigosTps, 'class' => 'form-control', 'label' => false]) ?>        
    </div>  
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Situação</label>
        <?= $this->Form->control('situation_id', ['options' => $situations, 'class' => 'form-control', 'label' => false]) ?>        
    </div>  
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>
