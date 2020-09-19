<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo $artigo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Artigo'), ['action' => 'edit', $artigo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Artigo'), ['action' => 'delete', $artigo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Artigos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artigo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Robots'), ['controller' => 'Robots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Robot'), ['controller' => 'Robots', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artigos Tps'), ['controller' => 'ArtigosTps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artigos Tp'), ['controller' => 'ArtigosTps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artigos Cats'), ['controller' => 'ArtigosCats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artigos Cat'), ['controller' => 'ArtigosCats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="artigos view large-9 medium-8 columns content">
    <h3><?= h($artigo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($artigo->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($artigo->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($artigo->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Keywords') ?></th>
            <td><?= h($artigo->keywords) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($artigo->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Robot') ?></th>
            <td><?= $artigo->has('robot') ? $this->Html->link($artigo->robot->id, ['controller' => 'Robots', 'action' => 'view', $artigo->robot->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $artigo->has('user') ? $this->Html->link($artigo->user->name, ['controller' => 'Users', 'action' => 'view', $artigo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situation') ?></th>
            <td><?= $artigo->has('situation') ? $this->Html->link($artigo->situation->nome_situacao, ['controller' => 'Situations', 'action' => 'view', $artigo->situation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Artigos Tp') ?></th>
            <td><?= $artigo->has('artigos_tp') ? $this->Html->link($artigo->artigos_tp->id, ['controller' => 'ArtigosTps', 'action' => 'view', $artigo->artigos_tp->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Artigos Cat') ?></th>
            <td><?= $artigo->has('artigos_cat') ? $this->Html->link($artigo->artigos_cat->id, ['controller' => 'ArtigosCats', 'action' => 'view', $artigo->artigos_cat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($artigo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qnt Acesso') ?></th>
            <td><?= $this->Number->format($artigo->qnt_acesso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($artigo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($artigo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($artigo->descricao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Conteudo') ?></h4>
        <?= $this->Text->autoParagraph(h($artigo->conteudo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Resumo Publico') ?></h4>
        <?= $this->Text->autoParagraph(h($artigo->resumo_publico)); ?>
    </div>
</div>
