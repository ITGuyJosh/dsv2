<?php

App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {                        

            $this->User->create();
            if ($this->User->save($this->request->data)) {

                //create new folder
                $uid = $this->User->id;
                $folder = new Folder(WWW_ROOT . "files" . DS . "users" . DS . $uid, true, 0755);
                $docs = new Folder(WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "docs", true, 0755);
                $archive = new Folder(WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "archive", true, 0755);
               
                //message and redirect
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {
        $this->layout = "nonav";
        if ($this->request->is("post")) {
            //authenticate login via credentials
            if ($this->Auth->login()) {                 
               $uid = AuthComponent::user("id");
               //geting which type of user it is to navigate to appropriate dashboard
               $user = $this->User->whichUser($uid);
               if($user["User"]["role"] == "0"){
                   return $this->redirect(array("action" => "adash"));
               } elseif($user["User"]["role"] == "1"){
                   $this->layout = "nonav";
                   return $this->redirect(array("controller" => "user_documents", "action" => "udash"));
               } else{
                   $this->Session->setFlash(__("Invalid username or password, please try again."));
                   return $this->redirect(array("action" => "logout"));
               }                
            }            
        }
    }

    public function logout() {
        $this->layout = "nonav";
        $this->Auth->logout();
        return $this->redirect(array("action" => "login"));
    }
    
    public function adash(){
        $data = $this->User->countData();
        $this->set("data", $data);
    }

}
