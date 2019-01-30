<?php
namespace App\Listener;

use Cake\Event\EventListenerInterface;

class UserListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Users.Component.UsersAuth.afterLogin' => 'loginRedirect',
            'Users.Component.UsersAuth.afterLogout' => 'logoutRedirect',
        ];
    }

    public function loginRedirect($event)
    {
        return ['plugin' => false, 'controller' => 'Offices', 'action' => 'index'];
    }

    public function logoutRedirect($event)
    {
        return ['plugin' => false, 'controller' => 'Pages', 'action' => 'welcome'];
    }
}