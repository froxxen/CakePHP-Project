<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Office $office
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div id="custom_save_tables">
    <div class="offices form large-9 medium-8 columns content" id="office_table">
        <?= $this->Form->create() ?>
        <fieldset>
            <h3><?= __('Lisää sovellus') ?></h3>
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
</div>