<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Sobre Empresa</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'),['controller' => 'EmpresasSobs','action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']);
        ?>
    </div>
</div>
<?= $this->Flash->render() ?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th class="d-none d-sm-table-cell">Ordem</th>
                <th class="d-none d-lg-table-cell">Situação</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresasSobs as $empresasSob): ?>
                <tr>
                    <td><?= $this->Number->format($empresasSob->id) ?></td>
                    <td><?= h($empresasSob->titulo) ?></td>
                    <td class="d-none d-sm-table-cell">
                        <?= h($empresasSob->ordem) ?>
                    </td>
                    <td class="d-none d-lg-table-cell">
                        <?php
                        if($empresasSob->situation->id == 1){
                            echo "<span class='badge badge-success'>".$empresasSob->situation->nome_situacao."</span>";
                        }else{
                            echo "<span class='badge badge-danger'>".$empresasSob->situation->nome_situacao."</span>";
                        }
                        ?>                          
                    </td>
                    <td>
                        <span class="d-none d-md-block">
                            <?= $this->Html->link(__('<i class="fas fa-angle-double-up"></i>'), 
                            [
                                'controller' => 'EmpresasSobs', 
                                'action' => 'altOrdemEmpresasSob', 
                                $empresasSob->id
                            ], 
                            [
                                'class' => 'btn btn-outline-info btn-sm',
                                'escape' => false
                            ]) ?>

                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'EmpresasSobs', 'action' => 'view', $empresasSob->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                            <?= $this->Html->link(__('Editar'), ['controller' => 'EmpresasSobs', 'action' => 'edit', $empresasSob->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'EmpresasSobs', 'action' => 'delete', $empresasSob->id], ['class' =>'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o sobre empresa # {0}?', $empresasSob->id)]) ?>
                        </span>  
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'EmpresasSobs', 'action' => 'view', $empresasSob->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Html->link(__('Editar'), ['controller' => 'EmpresasSobs', 'action' => 'edit', $empresasSob->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'EmpresasSobs', 'action' => 'delete', $empresasSob->id], ['class' =>'dropdown-item', 'confirm' => __('Relamente deseja apagar o sobre empresa # {0}?', $empresasSob->id)]) ?>
                            </div>
                        </div>                         
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>