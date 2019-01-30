<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="devices form large-9 medium-8 columns content">
    <?= $this->Form->create($device) ?>
    <fieldset>
        <legend><?= __('Add Device') ?></legend>
        <?php
            echo $this->Form->control('deviceName');
            echo $this->Form->control('user');
            echo $this->Form->control('purpose');
            echo $this->Form->control('deviceSerialNo');
            echo $this->Form->control('deviceOs');
            echo $this->Form->control('isNew');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
