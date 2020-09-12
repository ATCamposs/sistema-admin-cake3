<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carousel[]|\Cake\Collection\CollectionInterface $carousels
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Carousel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="carousels index large-9 medium-8 columns content">
    <h3><?= __('Carousels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_carousel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imagem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo_botao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('situation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carousels as $carousel): ?>
            <tr>
                <td><?= $this->Number->format($carousel->id) ?></td>
                <td><?= h($carousel->nome_carousel) ?></td>
                <td><?= h($carousel->imagem) ?></td>
                <td><?= h($carousel->titulo) ?></td>
                <td><?= h($carousel->descricao) ?></td>
                <td><?= h($carousel->titulo_botao) ?></td>
                <td><?= h($carousel->link) ?></td>
                <td><?= $this->Number->format($carousel->ordem) ?></td>
                <td><?= $carousel->has('position') ? $this->Html->link($carousel->position->id, ['controller' => 'Positions', 'action' => 'view', $carousel->position->id]) : '' ?></td>
                <td><?= $carousel->has('color') ? $this->Html->link($carousel->color->id, ['controller' => 'Colors', 'action' => 'view', $carousel->color->id]) : '' ?></td>
                <td><?= $carousel->has('situation') ? $this->Html->link($carousel->situation->id, ['controller' => 'Situations', 'action' => 'view', $carousel->situation->id]) : '' ?></td>
                <td><?= h($carousel->created) ?></td>
                <td><?= h($carousel->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $carousel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carousel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carousel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carousel->id)]) ?>
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
