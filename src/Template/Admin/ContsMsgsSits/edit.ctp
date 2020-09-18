<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContsMsgsSit $contsMsgsSit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contsMsgsSit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contsMsgsSit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Conts Msgs Sits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contatos Msgs'), ['controller' => 'ContatosMsgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contatos Msg'), ['controller' => 'ContatosMsgs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contsMsgsSits form large-9 medium-8 columns content">
    <?= $this->Form->create($contsMsgsSit) ?>
    <fieldset>
        <legend><?= __('Edit Conts Msgs Sit') ?></legend>
        <?php
            echo $this->Form->control('nome_sit_msg_cont');
            echo $this->Form->control('color_id', ['options' => $colors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
