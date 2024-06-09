<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TemporaryTokens Controller
 *
 * @property \App\Model\Table\TemporaryTokensTable $TemporaryTokens
 */
class TemporaryTokensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TemporaryTokens->find()
            ->contain(['Persons']);
        $temporaryTokens = $this->paginate($query);

        $this->set(compact('temporaryTokens'));
    }

    /**
     * View method
     *
     * @param string|null $id Temporary Token id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $temporaryToken = $this->TemporaryTokens->get($id, contain: ['Persons']);
        $this->set(compact('temporaryToken'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $temporaryToken = $this->TemporaryTokens->newEmptyEntity();
        if ($this->request->is('post')) {
            $temporaryToken = $this->TemporaryTokens->patchEntity($temporaryToken, $this->request->getData());
            if ($this->TemporaryTokens->save($temporaryToken)) {
                $this->Flash->success(__('The temporary token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temporary token could not be saved. Please, try again.'));
        }
        $persons = $this->TemporaryTokens->Persons->find('list', limit: 200)->all();
        $this->set(compact('temporaryToken', 'persons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Temporary Token id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $temporaryToken = $this->TemporaryTokens->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $temporaryToken = $this->TemporaryTokens->patchEntity($temporaryToken, $this->request->getData());
            if ($this->TemporaryTokens->save($temporaryToken)) {
                $this->Flash->success(__('The temporary token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temporary token could not be saved. Please, try again.'));
        }
        $persons = $this->TemporaryTokens->Persons->find('list', limit: 200)->all();
        $this->set(compact('temporaryToken', 'persons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Temporary Token id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $temporaryToken = $this->TemporaryTokens->get($id);
        if ($this->TemporaryTokens->delete($temporaryToken)) {
            $this->Flash->success(__('The temporary token has been deleted.'));
        } else {
            $this->Flash->error(__('The temporary token could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
