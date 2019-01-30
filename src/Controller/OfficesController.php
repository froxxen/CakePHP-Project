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

     public function customsoftware($id = null, $args = null)
    {
      $conn = $this->loadModel('Connections');
      $room = $this->loadModel('Rooms');
      $device = $this->loadModel('Devices');
      $soft = $this->loadModel('Softwares');
      
      $dataFromUrl = func_get_args();
      // haetaan toimipisteen ja huoneen id
      $officeId = $this->Offices->get($id, [
            'contain' => []
        ]);
     // $roomId = $this->Rooms->get($id, [
     //       'contain' => []
     //   ]);

     // $deviceId = $this->Devices->get($id, [
      //      'contain' => []
      //  ]);

      $officeId = $officeId['id'];
     // $roomId = $roomId['id'];
      $deviceId = $dataFromUrl[1];


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
               // $dataToSave['room_id'] = $roomId;
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

    public function customroom($id = null)
    {
      $conn = $this->loadModel('Connections');
      $room = $this->loadModel('Rooms');
     // $device = $this->loadModel('Devices');
     // $soft = $this->loadModel('Softwares');

      // haetaan toimipisteen ja huoneen id
      $officeId = $this->Offices->get($id, [
            'contain' => []
        ]);

      $officeId = $officeId['id'];


          if ($this->request->is('post')) {
            $customData = $this->request->getData();

             // uusi huone
            $newRoom = $this->Rooms->newEntity();

            $newRoom = $this->Rooms->patchEntity($newRoom, $customData); 

            // tarkistetaan, että tallennettava yritys löytyy
            if(isset($newRoom))
            {
                if ($this->Rooms->save($newRoom)) {

                   
                   $this->Flash->success(__('Eka tallennus onnistui'));

                  $newConnection = $this->Connections->newEntity();

                  $dataToSave['office_id'] = $officeId;
                  $dataToSave['room_id'] = $newRoom['id'];
                 

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
               else {
                    $this->Flash->error(__('Tallennus epäonnistui, laitoithan huoneen numeron?'));
               }

               
            }
        }

        $this->set(compact('office', 'conn', 'room', 'device'));
        $this->set('_serialize', ['office', 'conn', 'room','device']); 
    }

    public function customdevice($id = null, $args = null)
    {
      $conn = $this->loadModel('Connections');
      $room = $this->loadModel('Rooms');
      $device = $this->loadModel('Devices');
     // $soft = $this->loadModel('Softwares');

      $dataFromUrl = func_get_args();

      // haetaan toimipisteen ja huoneen id
      $officeId = $this->Offices->get($id, [
            'contain' => []
        ]);

      $officeId = $officeId['id'];

      $roomId = $dataFromUrl[1];


          if ($this->request->is('post')) {
            $customData = $this->request->getData();

             // uusi huone
            $newDevice = $this->Devices->newEntity();

            $newDevice = $this->Devices->patchEntity($newDevice, $customData); 

            // tarkistetaan, että tallennettava yritys löytyy
            if(isset($newDevice))
            {
                $this->Devices->save($newDevice);

                $newConnection = $this->Connections->newEntity();

                $dataToSave['office_id'] = $officeId;
                $dataToSave['room_id'] = $roomId;
                $dataToSave['device_id'] = $newDevice['id'];
               

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

        $this->set(compact('office', 'conn', 'room', 'device'));
        $this->set('_serialize', ['office', 'conn', 'room','device']); 
    }
}
