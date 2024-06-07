<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PersonLinks Controller
 *
 * @property \App\Model\Table\PersonLinksTable $PersonLinks
 */
class PersonLinksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->PersonLinks->find()
            ->contain(['Persons']);
        $personLinks = $this->paginate($query);

        $this->set(compact('personLinks'));
    }

    /**
     * View method
     *
     * @param string|null $id Person Link id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personLink = $this->PersonLinks->get($id, contain: ['Persons']);
        $this->set(compact('personLink'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personLink = $this->PersonLinks->newEmptyEntity();
        if ($this->request->is('post')) {
            $personLink = $this->PersonLinks->patchEntity($personLink, $this->request->getData());
            if ($this->PersonLinks->save($personLink)) {
                $this->Flash->success(__('The person link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person link could not be saved. Please, try again.'));
        }
        $persons = $this->PersonLinks->Persons->find('list', limit: 200)->all();
        $this->set(compact('personLink', 'persons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person Link id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personLink = $this->PersonLinks->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personLink = $this->PersonLinks->patchEntity($personLink, $this->request->getData());
            if ($this->PersonLinks->save($personLink)) {
                $this->Flash->success(__('The person link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person link could not be saved. Please, try again.'));
        }
        $persons = $this->PersonLinks->Persons->find('list', limit: 200)->all();
        $this->set(compact('personLink', 'persons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person Link id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personLink = $this->PersonLinks->get($id);
        if ($this->PersonLinks->delete($personLink)) {
            $this->Flash->success(__('The person link has been deleted.'));
        } else {
            $this->Flash->error(__('The person link could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
