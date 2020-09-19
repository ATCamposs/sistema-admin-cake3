<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Artigo</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Artigos', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'Artigos', 'action' => 'edit', $artigo->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Artigos', 'action' => 'delete', $artigo->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o artigo # {0}?', $artigo->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Artigos', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Artigos', 'action' => 'edit', $artigo->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Artigos', 'action' => 'delete', $artigo->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar o artigo # {0}?', $artigo->id)]) ?>                                    
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">Imagem</dt>
    <dd class="col-sm-9">
        <div class="img-profile">
            <?php if(!empty($artigo->imagem)){ ?>
                <?= $this->Html->image('../files/artigo/'.$artigo->id.'/'.$artigo->imagem, ['width' => '150', 'height' => '120']) ?>&nbsp;
                
                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Artigos',
                            'action' => 'alterarFotoArtigo',
                            $artigo->id
                        ],
                        [
                            'escape'=> false
                        ]
                    ); ?>
                </div>

            <?php } else { ?>
                <?= $this->Html->image('../files/artigo/preview_img.jpg', ['width' => '150', 'height' => '120']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Artigos',
                            'action' => 'alterarFotoArtigo',
                            $artigo->id
                        ],
                        [
                            'escape'=> false
                        ]
                    ); ?>
                </div>
            <?php } ?>
        </div>        
    </dd>
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($artigo->id) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($artigo->titulo) ?></dd>

    <dt class="col-sm-3">Autor</dt>
    <dd class="col-sm-9">
        <?= $artigo->has('user') ? $this->Html->link($artigo->user->name, ['controller' => 'Users', 'action' => 'view', $artigo->user->id]) : '' ?>
    </dd>

    <dt class="col-sm-3">Quantidade de Acesso</dt>
    <dd class="col-sm-9"><?= h($artigo->qnt_acesso) ?></dd>

    <dt class="col-sm-3">Situação</dt>
    <dd class="col-sm-9">
        <?php echo "<span class='badge badge-".$artigo->situation->color->cor."'>".$artigo->situation->nome_situacao."</span>"; ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($artigo->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($artigo->modified) ?></dd>
</dl>
<h2 class="display-4 titulo">SEO</h2>
<dl class="row">
    <dt class="col-sm-3">Slug</dt>
    <dd class="col-sm-9"><?= h($artigo->slug) ?></dd>

    <dt class="col-sm-3">Palavra Chave</dt>
    <dd class="col-sm-9"><?= h($artigo->keywords) ?></dd>

    <dt class="col-sm-3">Descrição SEO</dt>
    <dd class="col-sm-9"><?= h($artigo->description) ?></dd>

    <dt class="col-sm-3">Buscadores</dt>
    <dd class="col-sm-9"><?= h($artigo->robot->tipo) ?> - <?= h($artigo->robot->nome) ?></dd>

    <dt class="col-sm-3">Tipo do Artigo</dt>
    <dd class="col-sm-9"><?= h($artigo->artigos_tp->nome) ?></dd>

</dl>
<h2 class="display-4 titulo">Conteúdo</h2>
<dl class="row">

    <dt class="col-sm-3">Categoria</dt>
    <dd class="col-sm-9">
        <?= $artigo->has('artigos_cat') ? $this->Html->link($artigo->artigos_cat->nome, ['controller' => 'ArtigosCats', 'action' => 'view', $artigo->artigos_cat->id]) : '' ?>
    </dd>

    <dt class="col-sm-3">Apresentação</dt>
    <dd class="col-sm-9"><?= h($artigo->descricao) ?></dd>

    <dt class="col-sm-3">Resumo Público</dt>
    <dd class="col-sm-9"><?= h($artigo->resumo_publico) ?></dd>

    <dt class="col-sm-3">Conteúdo</dt>
    <dd class="col-sm-9"><?= h($artigo->conteudo) ?></dd>

</dl>
<?php //var_dump($artigo); ?>