<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Software $software
 */$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $software->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $software->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Softwares'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="softwares form large-9 medium-8 columns content" id="office_table">
    <?= $this->Form->create($software) ?>
    <fieldset>
        <h2><?= __('Muokkaa sovelluksen tietoja') ?></h2>
        <?php
            echo $this->Form->control('softwareName', ['label' => 'Nimi']);
            echo $this->Form->control('softwareLicence', ['label' => 'Lisenssi']);
        ?>
    </fieldset>
    <div class="send_btn">
    <?= $this->Form->button(__('Tallenna')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
