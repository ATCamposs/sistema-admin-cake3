<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtigosCat $artigosCat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Artigos Cat'), ['action' => 'edit', $artigosCat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Artigos Cat'), ['action' => 'delete', $artigosCat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigosCat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Artigos Cats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artigos Cat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="artigosCats view large-9 medium-8 columns content">
    <h3><?= h($artigosCat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($artigosCat->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situation') ?></th>
            <td><?= $artigosCat->has('situation') ? $this->Html->link($artigosCat->situation->nome_situacao, ['controller' => 'Situations', 'action' => 'view', $artigosCat->situation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($artigosCat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($artigosCat->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($artigosCat->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Artigos') ?></h4>
        <?php if (!empty($artigosCat->artigos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Conteudo') ?></th>
                <th scope="col"><?= __('Imagem') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Keywords') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Resumo Publico') ?></th>
                <th scope="col"><?= __('Qnt Acesso') ?></th>
                <th scope="col"><?= __('Robot Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Situation Id') ?></th>
                <th scope="col"><?= __('Artigos Tp Id') ?></th>
                <th scope="col"><?= __('Artigos Cat Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artigosCat->artigos as $artigos): ?>
            <tr>
                <td><?= h($artigos->id) ?></td>
                <td><?= h($artigos->titulo) ?></td>
                <td><?= h($artigos->descricao) ?></td>
                <td><?= h($artigos->conteudo) ?></td>
                <td><?= h($artigos->imagem) ?></td>
                <td><?= h($artigos->slug) ?></td>
                <td><?= h($artigos->keywords) ?></td>
                <td><?= h($artigos->description) ?></td>
                <td><?= h($artigos->resumo_publico) ?></td>
                <td><?= h($artigos->qnt_acesso) ?></td>
                <td><?= h($artigos->robot_id) ?></td>
                <td><?= h($artigos->user_id) ?></td>
                <td><?= h($artigos->situation_id) ?></td>
                <td><?= h($artigos->artigos_tp_id) ?></td>
                <td><?= h($artigos->artigos_cat_id) ?></td>
                <td><?= h($artigos->created) ?></td>
                <td><?= h($artigos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Artigos', 'action' => 'view', $artigos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Artigos', 'action' => 'edit', $artigos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Artigos', 'action' => 'delete', $artigos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
