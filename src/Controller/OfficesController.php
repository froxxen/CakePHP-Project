<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Offices Controller
 *
 * @property \App\Model\Table\OfficesTable $Offices
 *
 * @method \App\Model\Entity\Office[] paginate($object = null, array $settings = [])
 */
class OfficesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $offices = $this->paginate($this->Offices);

        $this->set(compact('offices'));
        $this->set('_serialize', ['offices']);
    }

    /**
     * View method
     *
     * @param string|null $id Office id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $office = $this->Offices->get($id, [
            'contain' => ['Connections' => ['softwares', 'rooms', 'devices']]
        ]);

        $this->set('office', $office);
        $this->set('_serialize', ['office']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $office = $this->Offices->newEntity();
        if ($this->request->is('post')) {
            $office = $this->Offices->patchEntity($office, $this->request->getData());
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The office could not be saved. Please, try again.'));
        }
        $this->set(compact('office'));
        $this->set('_serialize', ['office']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $office = $this->Offices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $office = $this->Offices->patchEntity($office, $this->request->getData());
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The office could not be saved. Please, try again.'));
        }
        $this->set(compact('office'));
        $this->set('_serialize', ['office']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $office = $this->Offices->get($id);
        if ($this->Offices->delete($office)) {
            $this->Flash->success(__('The office has been deleted.'));
        } else {
            $this->Flash->error(__('The office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
