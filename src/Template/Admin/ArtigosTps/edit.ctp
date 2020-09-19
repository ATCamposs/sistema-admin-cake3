<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtigosTp $artigosTp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artigosTp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artigosTp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Artigos Tps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artigosTps form large-9 medium-8 columns content">
    <?= $this->Form->create($artigosTp) ?>
    <fieldset>
        <legend><?= __('Edit Artigos Tp') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
