<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
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
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('RoomPurpose') ?></th>
            <td><?= h($room->roomPurpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RoomNumber') ?></th>
            <td><?= h($room->roomNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($room->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($room->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Connections') ?></h4>
        <?php if (!empty($room->connections)): ?>
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
        <?php endif; ?>
    </div>
</div>
