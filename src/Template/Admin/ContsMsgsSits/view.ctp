<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContsMsgsSit $contsMsgsSit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conts Msgs Sit'), ['action' => 'edit', $contsMsgsSit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conts Msgs Sit'), ['action' => 'delete', $contsMsgsSit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contsMsgsSit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conts Msgs Sits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conts Msgs Sit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contatos Msgs'), ['controller' => 'ContatosMsgs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contatos Msg'), ['controller' => 'ContatosMsgs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contsMsgsSits view large-9 medium-8 columns content">
    <h3><?= h($contsMsgsSit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Sit Msg Cont') ?></th>
            <td><?= h($contsMsgsSit->nome_sit_msg_cont) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= $contsMsgsSit->has('color') ? $this->Html->link($contsMsgsSit->color->nome_cor, ['controller' => 'Colors', 'action' => 'view', $contsMsgsSit->color->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contsMsgsSit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contsMsgsSit->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contsMsgsSit->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contatos Msgs') ?></h4>
        <?php if (!empty($contsMsgsSit->contatos_msgs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Assunto') ?></th>
                <th scope="col"><?= __('Mensagem') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Conts Msgs Sit Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contsMsgsSit->contatos_msgs as $contatosMsgs): ?>
            <tr>
                <td><?= h($contatosMsgs->id) ?></td>
                <td><?= h($contatosMsgs->nome) ?></td>
                <td><?= h($contatosMsgs->email) ?></td>
                <td><?= h($contatosMsgs->assunto) ?></td>
                <td><?= h($contatosMsgs->mensagem) ?></td>
                <td><?= h($contatosMsgs->user_id) ?></td>
                <td><?= h($contatosMsgs->conts_msgs_sit_id) ?></td>
                <td><?= h($contatosMsgs->created) ?></td>
                <td><?= h($contatosMsgs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ContatosMsgs', 'action' => 'view', $contatosMsgs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContatosMsgs', 'action' => 'edit', $contatosMsgs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContatosMsgs', 'action' => 'delete', $contatosMsgs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contatosMsgs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
