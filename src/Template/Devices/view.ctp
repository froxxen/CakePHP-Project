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
        <li><?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="devices view large-9 medium-8 columns content" id="all_tables">
    <h1><?= h($device->deviceName) ?></h1>
    <table class="table" id="office_table">
        <tr>
            <th scope="row"><?= __('Laitteen nimi') ?></th>
            <td><?= h($device->deviceName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Käyttäjä') ?></th>
            <td><?= h($device->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Käyttötarkoitus') ?></th>
            <td><?= h($device->purpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sarjanumero') ?></th>
            <td><?= h($device->deviceSerialNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Käyttöjärjestelmä') ?></th>
            <td><?= h($device->deviceOs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uusi laite k/e?') ?></th>
            <td><?= h($device->isNew) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($device->id) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Luotu') ?></th>
            <td><?= h($device->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Muokattu') ?></th>
            <td><?= h($device->modified) ?></td>
        </tr>
    </table>
    <?php
            $das = 123;
            $deviceData = $device->connections;
            echo "<br>";
            //debug($device['connections'][0]['office_id']);
         ?>
        
    <!--
    <div class="related">
        <h4><?= __('Related Connections') ?></h4>
        <?php if (!empty($device->connections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Office Id') ?></th>
                <th scope="col"><?= __('Room Id') ?></th>
                <th scope="col"><?= __('Device Id') ?></th>
                <th scope="col"><?= __('Software Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($device->connections as $connections): ?>
            <tr>
                <td><?= h($connections->id) ?></td>
                <td><?= h($connections->office_id) ?></td>
                <td><?= h($connections->room_id) ?></td>
                <td><?= h($connections->device_id) ?></td>
                <td><?= h($connections->software_id) ?></td>
                <td><?= h($connections->created) ?></td>
                <td><?= h($connections->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Katso tiedot'), ['controller' => 'Connections', 'action' => 'view', $connections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Connections', 'action' => 'edit', $connections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Connections', 'action' => 'delete', $connections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?> -->
            <?php

            $officeData = $device->connections;
            $oldId = 0;

         ?>

        <h3><?= __('Sovellusten tiedot') ?></h3>
        <div class="links">
            <?php if (!empty($officeData)): ?>
            <table class="table table-striped" cellpadding="0" cellspacing="0">
                
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Sovelluksen nimi') ?></th>
                        <th scope="col"><?= __('Sovelluksen lisenssi') ?></th>
                        <th scope="col"><?= __('Luotu') ?></th>
                        <th scope="col"><?= __('Muokattu') ?></th>

                        <th scope="col" class="actions"><?= __('Toiminnot') ?></th>
                    </tr>

                    <?php foreach ($officeData as $connections2): ?>
                       
                         <?php if ($connections2['Devices']['id'] == $device->id && $connections2['software_id'] != null): ?>
                           
                    <tr>
                        <td><?= h($connections2['Softwares']['id']) ?></td>
                        <td><?= h($connections2['Softwares']['softwareName']) ?></td>
                        <td><?= h($connections2['Softwares']['softwareLicence']) ?></td>
                        <td><?= h($connections2['Softwares']['created']) ?></td>
                        <td><?= h($connections2['Softwares']['modified']) ?></td>

                        
                        <td class="actions">
                           <!-- <?= $this->Html->link(__('Katso tiedot'), ['controller' => 'Softwares', 'action' => 'view', $connections['Softwares']['id'] ]) ?> -->
                            <?= $this->Html->link(__('Muokkaa'), ['controller' => 'Softwares', 'action' => 'edit', $connections['Softwares']['id'] ]) ?>
                            <?= $this->Form->postLink(__('Poista'), ['controller' => 'Connections', 'action' => 'delete', $connections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connections->id)]) ?>
                        </td>
                    </tr>
                    
                    <?php endif;?>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif;?>

            <div class="links">
                <?php  echo $this->Html->link(__('Lisää sovellus'), ['controller' => 'Offices', 'action' => 'customsoftware', $device['connections'][0]['office_id'], $device->id]);  ?>
            </div>
    </div>
</div>
