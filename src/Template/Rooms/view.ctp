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
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->


       

<div class="offices view large-9 medium-8 columns content">
    <h1><?= h("Huoneen tiedot") ?></h1>
    <table class="table" id="office_table">
        <tr>
            <th scope="row"><?= __('Huoneen tarkoitus') ?></th>
            <td><?= h($room->roomPurpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Huoneen numero') ?></th>
            <td><?= h($room->roomNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Luotu') ?></th>
            <td><?= h($room->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Muokattu') ?></th>
            <td><?= h($room->modified) ?></td>
        </tr>
    </table>

     <?php

            $roomData = $room->connections;
            $oldId = 0;
            echo "<br>";
           
         ?>

    <!--
    <div class="related">
        <h4><?= __('Related Connections') ?></h4>
        <?php if (!empty($room->connections)): ?>
        <table class="table table-striped" cellpadding="0" cellspacing="0">
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
            <?php foreach ($room->connections as $connections): ?>
            <tr>
                <td><?= h($connections->id) ?></td>
                <td><?= h($connections->office_id) ?></td>
                <td><?= h($connections->room_id) ?></td>
                <td><?= h($connections->device_id) ?></td>
                <td><?= h($connections->software_id) ?></td>
                <td><?= h($connections->created) ?></td>
                <td><?= h($connections->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Connections', 'action' => 'view', $connections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Connections', 'action' => 'edit', $connections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Connections', 'action' => 'delete', $connections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?> -->

           <h3><?= __('Laitteiden tiedot') ?></h3>
        <?php if (!empty($roomData)): ?>
        <div class="links">
            <table class="table table-striped" cellpadding="0" cellspacing="0">

                <tr>
                    <th scope="col"><?= __('Huoneen numero') ?></th>
                    <th scope="col"><?= __('Laitteen nimi') ?></th>
                    <th scope="col"><?= __('Käyttäjä') ?></th>
                    <th scope="col"><?= __('tarkoitus') ?></th>
                    <th scope="col"><?= __('Sarjanumero') ?></th>
                    <th scope="col"><?= __('Käyttöjärjestelmä') ?></th>
                    <th scope="col"><?= __('Uusi kone') ?></th>
                    <th scope="col"><?= __('Luotu') ?></th>
                    <th scope="col"><?= __('Muokattu') ?></th>
                    <th scope="col" class="actions"><?= __('Toiminnot') ?></th>
                </tr>
                <?php
                $oldId = [];
                $oldId[] = 0;

                 foreach ($roomData as $connections): ?>
                 
                  
                    <?php if ((!(in_array($connections['Devices']['id'], $oldId))) && $connections['Devices']['id'] != null): ?>
                <tr>
                    <td><?= h($connections['Rooms']['roomNumber']) ?></td>
                    <td><?= h($connections['Devices']['deviceName']) ?></td>
                    <td><?= h($connections['Devices']['user']) ?></td>
                    <td><?= h($connections['Devices']['purpose']) ?></td>
                    <td><?= h($connections['Devices']['deviceSerialNo']) ?></td>
                    <td><?= h($connections['Devices']['deviceOs']) ?></td>
                    <td><?= h($connections['Devices']['isNew']) ?></td>
                    <td><?= h($connections['Devices']['created']) ?></td>
                    <td><?= h($connections['Devices']['modified']) ?></td>

                    
                    <td class="actions">
                        <?= $this->Html->link(__('Katso tiedot'), ['controller' => 'Devices', 'action' => 'view',  $connections['device_id']]) ?>
                       <!-- <?= $this->Html->link(__('Lisää sovellus'), ['controller' => 'Offices', 'action' => 'custom',
                         $connections['software_id']]) ?> -->

                        <?= $this->Html->link(__('Muokkaa'), ['controller' => 'Devices', 'action' => 'edit',  $connections['device_id']]) ?>
                        <?= $this->Form->postLink(__('Poista'), ['controller' => 'Connections', 'action' => 'delete', $connections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connections->id)]) ?>
                    </td>
                </tr>
                    <?php endif; ?>
                    <?php $oldId[] = $connections['Devices']['id']; ?>
                <?php endforeach; ?>

                
            </table>
        </div>
        <?php endif; ?>

         <div class="links">
         <?php  echo $this->Html->link(__('Lisää laite'), ['controller' => 'Offices', 'action' => 'customdevice', $room['connections'][0]['office_id'], $room->id]);  ?>

      
         </div>
      
    </div>
</div>
