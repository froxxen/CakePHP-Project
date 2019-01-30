<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $device->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="devices form large-9 medium-8 columns content" id="office_table">
    <?= $this->Form->create($device) ?>
    <fieldset>
        <h1><?= __('Muokkaa laitteen tietoja') ?></h1>
        <?php
            echo $this->Form->control('deviceName', ['label' => 'Laitteen nimi']);
            echo $this->Form->control('user', ['label' => 'Käyttäjä']);
            echo $this->Form->control('purpose', ['label' => 'Käyttötarkoitus']);
            echo $this->Form->control('deviceSerialNo', ['label' => 'Sarjanumero']);
            echo $this->Form->control('deviceOs', ['label' => 'Käyttöjärjestelmä']);
            echo $this->Form->control('isNew', ['label' => 'Uusi k/e?']);
        ?>
    </fieldset>
    <div class="send_btn">
    <?= $this->Form->button(__('Tallenna')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
