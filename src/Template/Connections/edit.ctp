<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Connection $connection
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $connection->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $connection->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['action' => 'index']) ?></li>
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
<div class="connections form large-9 medium-8 columns content">
    <?= $this->Form->create($connection) ?>
    <fieldset>
        <legend><?= __('Edit Connection') ?></legend>
        <?php
            echo $this->Form->control('office_id', ['options' => $offices]);
            echo $this->Form->control('room_id', ['options' => $rooms]);
            echo $this->Form->control('device_id', ['options' => $devices]);
            echo $this->Form->control('software_id', ['options' => $softwares]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
