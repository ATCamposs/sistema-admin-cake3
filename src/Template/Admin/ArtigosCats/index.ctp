<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtigosCat[]|\Cake\Collection\CollectionInterface $artigosCats
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Artigos Cat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artigosCats index large-9 medium-8 columns content">
    <h3><?= __('Artigos Cats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('situation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artigosCats as $artigosCat): ?>
            <tr>
                <td><?= $this->Number->format($artigosCat->id) ?></td>
                <td><?= h($artigosCat->nome) ?></td>
                <td><?= $artigosCat->has('situation') ? $this->Html->link($artigosCat->situation->nome_situacao, ['controller' => 'Situations', 'action' => 'view', $artigosCat->situation->id]) : '' ?></td>
                <td><?= h($artigosCat->created) ?></td>
                <td><?= h($artigosCat->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $artigosCat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artigosCat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artigosCat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigosCat->id)]) ?>
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
