<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
$this->start('tb_body_start');
echo $this->Html->css('../webroot/css/style.css');
echo $this->Html->css('/webroot/css/bootstrap.css');
echo $this->Html->script(['/webroot/js/jquery-3.2.1.min', '/webroot/js/bootstrap.js']);
echo $this->Html->css(['cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css']);
echo $this->Html->script(['cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'])
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= Configure::read('App.title') ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right visible-xs">
                    <?= $this->fetch('tb_actions') ?>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-divider"></li> 

                    <li><?= $this->Html->link(__('Toimipisteet'), ['controller' => 'Offices','action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Uusi toimipiste'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
		      <li><?= $this->Html->link(__('Huoneet'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Laitteet'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Sovellukset'), ['controller' => 'Softwares', 'action' => 'index']) ?></li>
                    
                   <!-- <li><?= $this->Html->link(__('Uusi yhteys'), ['controller' => 'Connections', 'action' => 'add']) ?></li> -->
                   
                   <li><?= $this->Html->link(__('Käyttäjät'), 'http://95.85.16.209/dentalCareVer2/users/users');?></li>
                   <li> <?= $this->Html->link(__('Kirjaudu ulos'), ['action' => 'logout', 'controller' => 'Users/Users']); ?> </li>


                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
                
            </div>
        </div>
    </div>

  <!--  <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?= $this->fetch('tb_sidebar') ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><?= $this->request->controller; ?></h1> -->
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->append('content', '</div></div></div>');
echo $this->fetch('content');
