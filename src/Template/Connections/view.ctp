<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Connection $connection
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Connection'), ['action' => 'edit', $connection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Connection'), ['action' => 'delete', $connection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Connections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Connection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Softwares'), ['controller' => 'Softwares', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Software'), ['controller' => 'Softwares', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="connections view large-9 medium-8 columns content">
    <h3><?= h($connection->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Office') ?></th>
            <td><?= $connection->has('office') ? $this->Html->link($connection->office->name, ['controller' => 'Offices', 'action' => 'view', $connection->office->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room') ?></th>
            <td><?= $connection->has('room') ? $this->Html->link($connection->room->id, ['controller' => 'Rooms', 'action' => 'view', $connection->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $connection->has('device') ? $this->Html->link($connection->device->id, ['controller' => 'Devices', 'action' => 'view', $connection->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Software') ?></th>
            <td><?= $connection->has('software') ? $this->Html->link($connection->software->id, ['controller' => 'Softwares', 'action' => 'view', $connection->software->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($connection->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($connection->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($connection->modified) ?></td>
        </tr>
    </table>
</div>
