<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Office[]|\Cake\Collection\CollectionInterface $offices
 */
$this->extend('../Layout/TwitterBootstrap/dashboard');

?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Office'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Connections'), ['controller' => 'Connections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Connection'), ['controller' => 'Connections', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<br>
<div class="offices index large-9 medium-8 columns content" id="all_tables">

    <h1><?= __('Toimipisteet') ?></h1>
    
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Nimi') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Kaupunki') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Osoite') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Maakunta') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Postinumero') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Luotu') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Muokattu') ?></th>
                    <th scope="col" class="actions"><?= __('Toiminnot') ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($offices as $office): ?>
                <tr>
                    <td><?= $this->Number->format($office->id) ?></td>
                    <td><?= h($office->name) ?></td>
                    <td><?= h($office->city) ?></td>
                    <td><?= h($office->address) ?></td>
                    <td><?= h($office->region) ?></td>
                    <td><?= h($office->postalCode) ?></td>
                    <td><?= h($office->created) ?></td>
                    <td><?= h($office->modified) ?></td>
                    <td class="actions" id="links">
                        <?= $this->Html->link(__('Katso tiedot'), ['action' => 'view', $office->id]) ?>
                        <?= $this->Html->link(__('Muokkaa'), ['action' => 'edit', $office->id]) ?>
                        <?= $this->Form->postLink(__('Poista'), ['action' => 'delete', $office->id], ['confirm' => __('Are you sure you want to delete # {0}?', $office->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
         
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('Edellinen')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Seuraava') . ' >') ?>
            <?= $this->Paginator->last(__('Edellinen') . ' >>') ?>
        </ul>

        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
	 <div class="links">
          
            <?php  echo $this->Html->link(__('Lisää uusi Toimipiste'), ['controller' => 'Offices', 'action' => 'add']);  ?>

         </div>
    </div>

 	  
</div>
