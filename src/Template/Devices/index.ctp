<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="devices index large-9 medium-8 columns content" id="all_tables">
    <h1><?= __('Laitteet') ?></h1>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deviceName', ['label' => 'Nimi']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('user', ['label' => 'Käyttäjä']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('purpose', ['label' => 'Käyttötarkoitus']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('deviceSerialNo', ['label' => 'Sarjanumero']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('deviceOs', ['label' => 'Käyttöjärjestelmä']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('isNew', ['label' => 'Uusi laite k/e?']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Luotu']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Muokattu']) ?></th>
                <th scope="col" class="actions"><?= __('Toiminnot') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($devices as $device): ?>
            <tr>
                <td><?= $this->Number->format($device->id) ?></td>
                <td><?= h($device->deviceName) ?></td>
                <td><?= h($device->user) ?></td>
                <td><?= h($device->purpose) ?></td>
                <td><?= h($device->deviceSerialNo) ?></td>
                <td><?= h($device->deviceOs) ?></td>
                <td><?= h($device->isNew) ?></td>
                <td><?= h($device->created) ?></td>
                <td><?= h($device->modified) ?></td>
                <td class="actions" id="links">
                    <?= $this->Html->link(__('Katso tiedot'), ['action' => 'view', $device->id]) ?>
                    <?= $this->Html->link(__('Muokkaa'), ['action' => 'edit', $device->id]) ?>
                    <?= $this->Form->postLink(__('Poista'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?>
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
