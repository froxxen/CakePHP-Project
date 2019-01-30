<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Connection[]|\Cake\Collection\CollectionInterface $connections
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Softwares'), ['controller' => 'Softwares', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Software'), ['controller' => 'Softwares', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="connections index large-9 medium-8 columns content">
    <h3><?= __('Connections') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('office_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('software_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($connections as $connection): ?>
            <tr>
                <td><?= $this->Number->format($connection->id) ?></td>
                <td><?= $connection->has('office') ? $this->Html->link($connection->office->name, ['controller' => 'Offices', 'action' => 'view', $connection->office->id]) : '' ?></td>
                <td><?= $connection->has('room') ? $this->Html->link($connection->room->id, ['controller' => 'Rooms', 'action' => 'view', $connection->room->id]) : '' ?></td>
                <td><?= $connection->has('device') ? $this->Html->link($connection->device->id, ['controller' => 'Devices', 'action' => 'view', $connection->device->id]) : '' ?></td>
                <td><?= $connection->has('software') ? $this->Html->link($connection->software->id, ['controller' => 'Softwares', 'action' => 'view', $connection->software->id]) : '' ?></td>
                <td><?= h($connection->created) ?></td>
                <td><?= h($connection->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $connection->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $connection->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $connection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connection->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
