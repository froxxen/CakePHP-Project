<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */
?>
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
</nav>
<div class="devices view large-9 medium-8 columns content">
    <h3><?= h($device->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('DeviceName') ?></th>
            <td><?= h($device->deviceName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= h($device->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purpose') ?></th>
            <td><?= h($device->purpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DeviceSerialNo') ?></th>
            <td><?= h($device->deviceSerialNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DeviceOs') ?></th>
            <td><?= h($device->deviceOs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsNew') ?></th>
            <td><?= h($device->isNew) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($device->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($device->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($device->modified) ?></td>
        </tr>
    </table>
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
