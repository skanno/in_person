<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ServiceLinks Controller
 *
 * @property \App\Model\Table\ServiceLinksTable $ServiceLinks
 */
class ServiceLinksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ServiceLinks->find()
            ->contain(['Persons', 'Services']);
        $serviceLinks = $this->paginate($query);

        $this->set(compact('serviceLinks'));
    }

    /**
     * View method
     *
     * @param string|null $id Service Link id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceLink = $this->ServiceLinks->get($id, contain: ['Persons', 'Services']);
        $this->set(compact('serviceLink'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviceLink = $this->ServiceLinks->newEmptyEntity();
        if ($this->request->is('post')) {
            $serviceLink = $this->ServiceLinks->patchEntity($serviceLink, $this->request->getData());
            if ($this->ServiceLinks->save($serviceLink)) {
                $this->Flash->success(__('The service link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service link could not be saved. Please, try again.'));
        }
        $persons = $this->ServiceLinks->Persons->find('list', limit: 200)->all();
        $services = $this->ServiceLinks->Services->find('list', limit: 200)->all();
        $this->set(compact('serviceLink', 'persons', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Link id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serviceLink = $this->ServiceLinks->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceLink = $this->ServiceLinks->patchEntity($serviceLink, $this->request->getData());
            if ($this->ServiceLinks->save($serviceLink)) {
                $this->Flash->success(__('The service link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service link could not be saved. Please, try again.'));
        }
        $persons = $this->ServiceLinks->Persons->find('list', limit: 200)->all();
        $services = $this->ServiceLinks->Services->find('list', limit: 200)->all();
        $this->set(compact('serviceLink', 'persons', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Link id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviceLink = $this->ServiceLinks->get($id);
        if ($this->ServiceLinks->delete($serviceLink)) {
            $this->Flash->success(__('The service link has been deleted.'));
        } else {
            $this->Flash->error(__('The service link could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
