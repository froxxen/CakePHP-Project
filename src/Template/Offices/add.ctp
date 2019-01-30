<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Office $office
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="offices form large-9 medium-8 columns content">
    <?= $this->Form->create($office) ?>
    <fieldset>
        <legend><?= __('Add Office') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('city');
            echo $this->Form->control('address');
            echo $this->Form->control('region');
            echo $this->Form->control('postalCode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>