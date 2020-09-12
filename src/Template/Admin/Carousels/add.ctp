<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carousel $carousel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Carousels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="carousels form large-9 medium-8 columns content">
    <?= $this->Form->create($carousel) ?>
    <fieldset>
        <legend><?= __('Add Carousel') ?></legend>
        <?php
            echo $this->Form->control('nome_carousel');
            echo $this->Form->control('imagem');
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Form->control('titulo_botao');
            echo $this->Form->control('link');
            echo $this->Form->control('ordem');
            echo $this->Form->control('position_id', ['options' => $positions]);
            echo $this->Form->control('color_id', ['options' => $colors, 'empty' => true]);
            echo $this->Form->control('situation_id', ['options' => $situations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
