<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carousel $carousel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Carousel'), ['action' => 'edit', $carousel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Carousel'), ['action' => 'delete', $carousel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carousel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Carousels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carousel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carousels view large-9 medium-8 columns content">
    <h3><?= h($carousel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Carousel') ?></th>
            <td><?= h($carousel->nome_carousel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($carousel->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($carousel->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($carousel->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo Botao') ?></th>
            <td><?= h($carousel->titulo_botao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($carousel->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $carousel->has('position') ? $this->Html->link($carousel->position->id, ['controller' => 'Positions', 'action' => 'view', $carousel->position->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= $carousel->has('color') ? $this->Html->link($carousel->color->id, ['controller' => 'Colors', 'action' => 'view', $carousel->color->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situation') ?></th>
            <td><?= $carousel->has('situation') ? $this->Html->link($carousel->situation->id, ['controller' => 'Situations', 'action' => 'view', $carousel->situation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($carousel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ordem') ?></th>
            <td><?= $this->Number->format($carousel->ordem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($carousel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($carousel->modified) ?></td>
        </tr>
    </table>
</div>
