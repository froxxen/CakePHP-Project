<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Office $office
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Toiminnot') ?></li>
        <li><?= $this->Html->link(__('Muokkaa toimipisteen tietoja'), ['action' => 'edit', $office->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Poista toimipiste'), ['action' => 'delete', $office->id], ['confirm' => __('Are you sure you want to delete # {0}?', $office->id)]) ?> </li>
        <li><?= $this->Html->link(__('Kaikki toimipisteet'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Uusi toimipiste'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Kaikki yhteydet'), ['controller' => 'Connections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Uusi yhteys'), ['controller' => 'Connections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="offices view large-9 medium-8 columns content">
    <h3><?= h($office->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($office->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($office->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($office->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= h($office->region) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PostalCode') ?></th>
            <td><?= h($office->postalCode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($office->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($office->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($office->modified) ?></td>
        </tr>
    </table>
    <div class="related">

    <?php

        $officeData = $office->connections;
        $oldId = 0;
     ?>

        <h4><?= __('Huoneen tiedot') ?></h4>
        <?php if (!empty($officeData)): ?>
        <table cellpadding="0" cellspacing="0">

            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Huoneen tarkoitus') ?></th>
                <th scope="col"><?= __('Huoneen numero') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($officeData as $connections): ?>
                <?php if ($oldId != $connections['Rooms']['id']): ?>
            <tr>
                <td><?= h($connections['Rooms']['id']) ?></td>
                <td><?= h($connections['Rooms']['roomPurpose']) ?></td>
                <td><?= h($connections['Rooms']['roomNumber']) ?></td>
                
                <td><?= h($connections['Rooms']['created']) ?></td>
                <td><?= h($connections['Rooms']['modified']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Connections', 'action' => 'view', $connections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Connections', 'action' => 'edit', $connections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Connections', 'action' => 'delete', $connections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connections->id)]) ?>
                </td>
            </tr>
                <?php endif; ?>
            <?php $oldId = $connections['Rooms']['id']; ?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

         <h4><?= __('Laitteen tiedot') ?></h4>
        <?php if (!empty($officeData)): ?>
        <table cellpadding="0" cellspacing="0">

            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Laitteen nimi') ?></th>
                <th scope="col"><?= __('Käyttäjä') ?></th>
                <th scope="col"><?= __('tarkoitus') ?></th>
                <th scope="col"><?= __('Sarjanumero') ?></th>
                <th scope="col"><?= __('Käyttöjärjestelmä') ?></th>
                <th scope="col"><?= __('Uusi kone') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php
            $oldId = 0;
             foreach ($officeData as $connections): ?>
                 <?php if ($oldId != $connections['Devices']['id']): ?>
            <tr>
                <td><?= h($connections['Devices']['id']) ?></td>
                <td><?= h($connections['Devices']['deviceName']) ?></td>
                <td><?= h($connections['Devices']['user']) ?></td>
                <td><?= h($connections['Devices']['purpose']) ?></td>
                <td><?= h($connections['Devices']['deviceSerialNo']) ?></td>
                <td><?= h($connections['Devices']['deviceOs']) ?></td>
                <td><?= h($connections['Devices']['isNew']) ?></td>
                <td><?= h($connections['Devices']['created']) ?></td>
                <td><?= h($connections['Devices']['modified']) ?></td>

                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Connections', 'action' => 'view', $connections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Connections', 'action' => 'edit', $connections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Connections', 'action' => 'delete', $connections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connections->id)]) ?>
                </td>
            </tr>
                <?php endif; ?>
                <?php $oldId = $connections['Rooms']['id']; ?>
            <?php endforeach; ?>

            
        </table>
        <?php endif; ?>

          <h4><?= __('Sovellusten tiedot') ?></h4>
        <?php if (!empty($officeData)): ?>
        <table cellpadding="0" cellspacing="0">

            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Laitteen id') ?></th>
                <th scope="col"><?= __('Sovelluksen nimi') ?></th>
                <th scope="col"><?= __('Sovelluksen lisenssi') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($officeData as $connections): ?>
            <tr>
                <td><?= h($connections['Softwares']['id']) ?></td>
                <td><?= h($connections['Devices']['id']) ?></td>
                <td><?= h($connections['Softwares']['softwareName']) ?></td>
                <td><?= h($connections['Softwares']['softwareLicence']) ?></td>
                <td><?= h($connections['Softwares']['created']) ?></td>
                <td><?= h($connections['Softwares']['modified']) ?></td>

                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Connections', 'action' => 'view', $connections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Connections', 'action' => 'edit', $connections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Connections', 'action' => 'delete', $connections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>

            
        </table>
        <?php endif; ?>



    </div>
</div>
