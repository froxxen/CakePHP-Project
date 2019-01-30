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
    <div class="offices form large-9 medium-8 columns content" >
        <?= $this->Form->create() ?>
        <fieldset>
            <h3><?= __('Lisää laite') ?></h3>
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
</div>
