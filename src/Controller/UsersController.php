<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']); //Logout and Add-actions do NOT require authentication
    }

    
    public function index() {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

  
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
    }

    
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

        public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Käyttäjätunnuksesi tai salasanasi oli väärin.');
        }
    }

    public function logout() {
        $this->Flash->success('Kirjauduit juuri ulos.');
        return $this->redirect($this->Auth->logout());
    }


    //src: https://github.com/pitocms/cake-3-ajax-search/blob/master/Controller/TagsController.php
    public function search()
    {
        $this->request->allowMethod('ajax');
   
        $keyword = $this->request->query('keyword');
        
        $query = $this->Users->find('all',[
              'conditions' => ['name LIKE'=>'%'.$keyword.'%'],
              'order' => ['Users.id'=>'DESC'],
              'limit' => 3
        ]);
        $this->set('users', $this->paginate($query));
        $this->set('_serialize', ['users']);
    }
}
