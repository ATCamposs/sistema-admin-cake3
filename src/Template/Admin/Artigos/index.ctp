<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo[]|\Cake\Collection\CollectionInterface $artigos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Artigo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Robots'), ['controller' => 'Robots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Robot'), ['controller' => 'Robots', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artigos Tps'), ['controller' => 'ArtigosTps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artigos Tp'), ['controller' => 'ArtigosTps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artigos Cats'), ['controller' => 'ArtigosCats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artigos Cat'), ['controller' => 'ArtigosCats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artigos index large-9 medium-8 columns content">
    <h3><?= __('Artigos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imagem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keywords') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qnt_acesso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('robot_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('situation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('artigos_tp_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('artigos_cat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artigos as $artigo): ?>
            <tr>
                <td><?= $this->Number->format($artigo->id) ?></td>
                <td><?= h($artigo->titulo) ?></td>
                <td><?= h($artigo->imagem) ?></td>
                <td><?= h($artigo->slug) ?></td>
                <td><?= h($artigo->keywords) ?></td>
                <td><?= h($artigo->description) ?></td>
                <td><?= $this->Number->format($artigo->qnt_acesso) ?></td>
                <td><?= $artigo->has('robot') ? $this->Html->link($artigo->robot->id, ['controller' => 'Robots', 'action' => 'view', $artigo->robot->id]) : '' ?></td>
                <td><?= $artigo->has('user') ? $this->Html->link($artigo->user->name, ['controller' => 'Users', 'action' => 'view', $artigo->user->id]) : '' ?></td>
                <td><?= $artigo->has('situation') ? $this->Html->link($artigo->situation->nome_situacao, ['controller' => 'Situations', 'action' => 'view', $artigo->situation->id]) : '' ?></td>
                <td><?= $artigo->has('artigos_tp') ? $this->Html->link($artigo->artigos_tp->id, ['controller' => 'ArtigosTps', 'action' => 'view', $artigo->artigos_tp->id]) : '' ?></td>
                <td><?= $artigo->has('artigos_cat') ? $this->Html->link($artigo->artigos_cat->id, ['controller' => 'ArtigosCats', 'action' => 'view', $artigo->artigos_cat->id]) : '' ?></td>
                <td><?= h($artigo->created) ?></td>
                <td><?= h($artigo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $artigo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artigo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artigo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigo->id)]) ?>
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
