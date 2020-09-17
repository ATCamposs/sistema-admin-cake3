<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servico[]|\Cake\Collection\CollectionInterface $servicos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servico'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicos index large-9 medium-8 columns content">
    <h3><?= __('Servicos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo_ser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('icone_um') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo_um') ?></th>
                <th scope="col"><?= $this->Paginator->sort('icone_dois') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo_dois') ?></th>
                <th scope="col"><?= $this->Paginator->sort('icone_tres') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo_tres') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $servico): ?>
            <tr>
                <td><?= $this->Number->format($servico->id) ?></td>
                <td><?= h($servico->titulo_ser) ?></td>
                <td><?= h($servico->icone_um) ?></td>
                <td><?= h($servico->titulo_um) ?></td>
                <td><?= h($servico->icone_dois) ?></td>
                <td><?= h($servico->titulo_dois) ?></td>
                <td><?= h($servico->icone_tres) ?></td>
                <td><?= h($servico->titulo_tres) ?></td>
                <td><?= h($servico->created) ?></td>
                <td><?= h($servico->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servico->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
