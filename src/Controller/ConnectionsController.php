<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Connections Controller
 *
 * @property \App\Model\Table\ConnectionsTable $Connections
 *
 * @method \App\Model\Entity\Connection[] paginate($object = null, array $settings = [])
 */
class ConnectionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offices', 'Rooms', 'Devices', 'Softwares']
        ];
        $connections = $this->paginate($this->Connections);

        $this->set(compact('connections'));
        $this->set('_serialize', ['connections']);
    }

    /**
     * View method
     *
     * @param string|null $id Connection id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $connection = $this->Connections->get($id, [
            'contain' => ['Offices', 'Rooms', 'Devices', 'Softwares']
        ]);

        $this->set('connection', $connection);
        $this->set('_serialize', ['connection']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $connection = $this->Connections->newEntity();
        if ($this->request->is('post')) {
            $connection = $this->Connections->patchEntity($connection, $this->request->getData());
            if ($this->Connections->save($connection)) {
                $this->Flash->success(__('The connection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The connection could not be saved. Please, try again.'));
        }
        $offices = $this->Connections->Offices->find('list', ['limit' => 200]);
        $rooms = $this->Connections->Rooms->find('list', ['limit' => 200]);
        $devices = $this->Connections->Devices->find('list', ['limit' => 200]);
        $softwares = $this->Connections->Softwares->find('list', ['limit' => 200]);
        
        $this->set(compact('connection', 'offices', 'rooms', 'devices', 'softwares'));
        $this->set('_serialize', ['connection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Connection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $connection = $this->Connections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $connection = $this->Connections->patchEntity($connection, $this->request->getData());
            if ($this->Connections->save($connection)) {
                $this->Flash->success(__('The connection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The connection could not be saved. Please, try again.'));
        }
        $offices = $this->Connections->Offices->find('list', ['limit' => 200]);
        $rooms = $this->Connections->Rooms->find('list', ['limit' => 200]);
        $devices = $this->Connections->Devices->find('list', ['limit' => 200]);
        $softwares = $this->Connections->Softwares->find('list', ['limit' => 200]);
        $this->set(compact('connection', 'offices', 'rooms', 'devices', 'softwares'));
        $this->set('_serialize', ['connection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Connection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $connection = $this->Connections->get($id);
        if ($this->Connections->delete($connection)) {
            $this->Flash->success(__('The connection has been deleted.'));
        } else {
            $this->Flash->error(__('The connection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
