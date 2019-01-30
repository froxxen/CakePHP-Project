<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Software $software
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Softwares'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="softwares form large-9 medium-8 columns content">
    <?= $this->Form->create($software) ?>
    <fieldset>
        <legend><?= __('Add Software') ?></legend>
        <?php
            echo $this->Form->control('softwareName');
            echo $this->Form->control('softwareLicence');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
