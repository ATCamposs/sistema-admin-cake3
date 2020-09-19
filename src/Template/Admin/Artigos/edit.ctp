<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo $artigo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artigo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artigo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Artigos'), ['action' => 'index']) ?></li>
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
<div class="artigos form large-9 medium-8 columns content">
    <?= $this->Form->create($artigo) ?>
    <fieldset>
        <legend><?= __('Edit Artigo') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Form->control('conteudo');
            echo $this->Form->control('imagem');
            echo $this->Form->control('slug');
            echo $this->Form->control('keywords');
            echo $this->Form->control('description');
            echo $this->Form->control('resumo_publico');
            echo $this->Form->control('qnt_acesso');
            echo $this->Form->control('robot_id', ['options' => $robots]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('situation_id', ['options' => $situations]);
            echo $this->Form->control('artigos_tp_id', ['options' => $artigosTps]);
            echo $this->Form->control('artigos_cat_id', ['options' => $artigosCats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
