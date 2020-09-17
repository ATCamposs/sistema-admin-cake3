<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servico $servico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $servico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $servico->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Servicos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="servicos form large-9 medium-8 columns content">
    <?= $this->Form->create($servico) ?>
    <fieldset>
        <legend><?= __('Edit Servico') ?></legend>
        <?php
            echo $this->Form->control('titulo_ser');
            echo $this->Form->control('icone_um');
            echo $this->Form->control('titulo_um');
            echo $this->Form->control('descricao_um');
            echo $this->Form->control('icone_dois');
            echo $this->Form->control('titulo_dois');
            echo $this->Form->control('descricao_dois');
            echo $this->Form->control('icone_tres');
            echo $this->Form->control('titulo_tres');
            echo $this->Form->control('descricao_tres');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
