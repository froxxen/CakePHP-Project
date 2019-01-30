<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $room->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="rooms form large-9 medium-8 columns content" id="office_table">
    <?= $this->Form->create($room) ?>
    <fieldset>
        <h1><?= __('Muokkaa huoneen tietoja') ?></h1>
        <?php
            echo $this->Form->control('roomPurpose', ['label' => 'Huoneen tarkoitus']);
            echo $this->Form->control('roomNumber', ['label' => 'Huoneen numero']);
        ?>
    </fieldset>
    <div class="send_btn">
    <?= $this->Form->button(__('Tallenna')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>

