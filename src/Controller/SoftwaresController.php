<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Softwares Controller
 *
 * @property \App\Model\Table\SoftwaresTable $Softwares
 *
 * @method \App\Model\Entity\Software[] paginate($object = null, array $settings = [])
 */
class SoftwaresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $softwares = $this->paginate($this->Softwares);

        $this->set(compact('softwares'));
        $this->set('_serialize', ['softwares']);
    }

    /**
     * View method
     *
     * @param string|null $id Software id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $software = $this->Softwares->get($id, [
            'contain' => ['Connections']
        ]);

        $this->set('software', $software);
        $this->set('_serialize', ['software']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $software = $this->Softwares->newEntity();
        if ($this->request->is('post')) {
            $software = $this->Softwares->patchEntity($software, $this->request->getData());
            if ($this->Softwares->save($software)) {
                $this->Flash->success(__('The software has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The software could not be saved. Please, try again.'));
        }
        $this->set(compact('software'));
        $this->set('_serialize', ['software']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Software id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $software = $this->Softwares->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $software = $this->Softwares->patchEntity($software, $this->request->getData());
            if ($this->Softwares->save($software)) {
                $this->Flash->success(__('The software has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The software could not be saved. Please, try again.'));
        }
        $this->set(compact('software'));
        $this->set('_serialize', ['software']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Software id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $software = $this->Softwares->get($id);
        if ($this->Softwares->delete($software)) {
            $this->Flash->success(__('The software has been deleted.'));
        } else {
            $this->Flash->error(__('The software could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function customsoftwareadd()
    {
      $conn = $this->loadModel('Connections');
      $room = $this->loadModel('Rooms');
      $device = $this->loadModel('Devices');
     // $soft = $this->loadModel('Softwares');
      $office = $this->loadModel('Offices');

          if ($this->request->is('post')) {
            $office = $this->request->getData();
           
            debug($office);

        }
        /*$office = $this->Offices->newEntity();
        if ($this->request->is('post')) {
            $office = $this->Offices->patchEntity($office, $this->request->getData());
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The office could not be saved. Please, try again.'));
        }*/
        $this->set(compact('office', 'conn', 'room', 'device'));
        $this->set('_serialize', ['office', 'conn', 'room','device']); 
    }

    public function customsoftware($id = null)
    {
      $conn = $this->loadModel('Connections');
      $room = $this->loadModel('Rooms');
      $device = $this->loadModel('Devices');
      $soft = $this->loadModel('Softwares');

      // haetaan toimipisteen ja huoneen id
      $officeId = $this->Offices->get($id, [
            'contain' => []
        ]);
      $roomId = $this->Rooms->get($id, [
            'contain' => []
        ]);

      $deviceId = $this->Devices->get($id, [
            'contain' => []
        ]);

      $officeId = $officeId['id'];
      $roomId = $roomId['id'];
      $deviceId = $deviceId['id'];


          if ($this->request->is('post')) {
            $customData = $this->request->getData();

             // uusi huone
            $newSoftware = $this->Softwares->newEntity();

            $newSoftware = $this->Softwares->patchEntity($newSoftware, $customData); 

            // tarkistetaan, että tallennettava yritys löytyy
            if(isset($newSoftware))
            {
                $this->Softwares->save($newSoftware);

                $newConnection = $this->Connections->newEntity();

                $dataToSave['software_id'] = $newSoftware['id'];
                $dataToSave['office_id'] = $officeId;
                $dataToSave['room_id'] = $roomId;
                $dataToSave['device_id'] = $deviceId;


                $newConnection = $this->Connections->patchEntity($newConnection, $dataToSave); 

                 // tarkistetaan, että tallennettava yritys löytyy
                if(isset($newConnection))
                {
                    if ($this->Connections->save($newConnection)) {
                    
                    $this->Flash->success(__('Tallennus onnistui'));
                    return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('Tallennus epäonnistui'));
                }
            }
        }
        /*$office = $this->Offices->newEntity();
        if ($this->request->is('post')) {
            $office = $this->Offices->patchEntity($office, $this->request->getData());
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The office could not be saved. Please, try again.'));
        }*/
        $this->set(compact('office', 'conn', 'room', 'device'));
        $this->set('_serialize', ['office', 'conn', 'room','device']); 
    }

}
