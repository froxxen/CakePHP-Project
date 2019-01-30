<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room[]|\Cake\Collection\CollectionInterface $rooms
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="rooms index large-9 medium-8 columns content" id="all_tables">
    <h3><?= __('Huoneet') ?></h3>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roomPurpose', ['label' => 'Huoneen käyttötarkoitus']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('roomNumber', ['label' => 'Huoneen numero']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Luotu']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Muokattu']) ?></th>
                <th scope="col" class="actions"><?= __('Toiminnot') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $this->Number->format($room->id) ?></td>
                <td><?= h($room->roomPurpose) ?></td>
                <td><?= h($room->roomNumber) ?></td>
                <td><?= h($room->created) ?></td>
                <td><?= h($room->modified) ?></td>
                <td class="actions" id="links">
                    <?= $this->Html->link(__('Katso tiedot'), ['action' => 'view', $room->id]) ?>
                    <?= $this->Html->link(__('Muokkaa'), ['action' => 'edit', $room->id]) ?>
                    <?= $this->Form->postLink(__('Poista'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('Edellinen')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Seuraava') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
