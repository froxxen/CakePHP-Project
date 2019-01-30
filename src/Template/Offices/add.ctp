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
<div class="offices form large-9 medium-8 columns content" id="office_table">
    <?= $this->Form->create($office) ?>
    <fieldset>
        <h1><?= __('Lisää uusi toimisto') ?></h1>
        <?php
            echo $this->Form->control('name', ['label' => 'Nimi']);
            echo $this->Form->control('city', ['label' => 'Kaupunki']);
            echo $this->Form->control('address', ['label' => 'Osoite']);
            echo $this->Form->control('region', ['label' => 'Maakunta']);
            echo $this->Form->control('postalCode', ['label' => 'Postinumero']);
        ?>
    </fieldset>
    <div class="send_btn">
    <?= $this->Form->button(__('Tallenna')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
