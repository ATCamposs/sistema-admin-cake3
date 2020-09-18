<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContsMsgsSit[]|\Cake\Collection\CollectionInterface $contsMsgsSits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conts Msgs Sit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contatos Msgs'), ['controller' => 'ContatosMsgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contatos Msg'), ['controller' => 'ContatosMsgs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contsMsgsSits index large-9 medium-8 columns content">
    <h3><?= __('Conts Msgs Sits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_sit_msg_cont') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contsMsgsSits as $contsMsgsSit): ?>
            <tr>
                <td><?= $this->Number->format($contsMsgsSit->id) ?></td>
                <td><?= h($contsMsgsSit->nome_sit_msg_cont) ?></td>
                <td><?= $contsMsgsSit->has('color') ? $this->Html->link($contsMsgsSit->color->nome_cor, ['controller' => 'Colors', 'action' => 'view', $contsMsgsSit->color->id]) : '' ?></td>
                <td><?= h($contsMsgsSit->created) ?></td>
                <td><?= h($contsMsgsSit->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contsMsgsSit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contsMsgsSit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contsMsgsSit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contsMsgsSit->id)]) ?>
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
