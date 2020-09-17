<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Detalhes do Sobre Empresa</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'EmpresasSobs', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'EmpresasSobs', 'action' => 'edit', $empresasSob->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'EmpresasSobs', 'action' => 'delete', $empresasSob->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o sobre empresa # {0}?', $empresasSob->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'EmpresasSobs', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'EmpresasSobs', 'action' => 'edit', $empresasSob->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'EmpresasSobs', 'action' => 'delete', $empresasSob->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar o sobre empresa # {0}?', $empresasSob->id)]) ?>                                    
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">Imagem</dt>
    <dd class="col-sm-9">
        <div class="img-perfil">
            <?php if(!empty($empresasSob->imagem)){ ?>
                <?= $this->Html->image('../files/sob_emp/'.$empresasSob->id.'/'.$empresasSob->imagem, ['width' => '250', 'height' => '200']) ?>&nbsp;
                
                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'EmpresasSobs',
                            'action' => 'changeBusinessProfile',
                            $empresasSob->id
                        ],
                        [
                            'escape'=> false
                        ]
                    ); ?>
                </div>

            <?php } else { ?>
                <?= $this->Html->image('../files/sob_emp/preview_img.jpg', ['width' => '250', 'height' => '200']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'EmpresasSobs',
                            'action' => 'changeBusinessProfile',
                            $empresasSob->id
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
    <dd class="col-sm-9"><?= $this->Number->format($empresasSob->id) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($empresasSob->titulo) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($empresasSob->descricao) ?></dd>

    <dt class="col-sm-3">Ordem</dt>
    <dd class="col-sm-9"><?= h($empresasSob->ordem) ?></dd>

    <dt class="col-sm-3">Situação</dt>
    <dd class="col-sm-9">
        <?php
        if($empresasSob->situation->id == 1){
            echo "<span class='badge badge-success'>".$empresasSob->situation->nome_situacao."</span>";
        }else{
            echo "<span class='badge badge-danger'>".$empresasSob->situation->nome_situacao."</span>";
        }
        ?>            
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($empresasSob->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($empresasSob->modified) ?></dd>

</dl>