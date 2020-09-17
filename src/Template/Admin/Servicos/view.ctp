<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servico $servico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servico'), ['action' => 'edit', $servico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servico'), ['action' => 'delete', $servico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servico'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicos view large-9 medium-8 columns content">
    <h3><?= h($servico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo Ser') ?></th>
            <td><?= h($servico->titulo_ser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icone Um') ?></th>
            <td><?= h($servico->icone_um) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo Um') ?></th>
            <td><?= h($servico->titulo_um) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icone Dois') ?></th>
            <td><?= h($servico->icone_dois) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo Dois') ?></th>
            <td><?= h($servico->titulo_dois) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icone Tres') ?></th>
            <td><?= h($servico->icone_tres) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo Tres') ?></th>
            <td><?= h($servico->titulo_tres) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($servico->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($servico->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($servico->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao Um') ?></h4>
        <?= $this->Text->autoParagraph(h($servico->descricao_um)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descricao Dois') ?></h4>
        <?= $this->Text->autoParagraph(h($servico->descricao_dois)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descricao Tres') ?></h4>
        <?= $this->Text->autoParagraph(h($servico->descricao_tres)); ?>
    </div>
</div>
