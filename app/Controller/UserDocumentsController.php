<?php

App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * UserDocuments Controller
 *
 * @property UserDocument $UserDocument
 * @property PaginatorComponent $Paginator
 */
class UserDocumentsController extends AppController {

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
        $this->UserDocument->recursive = 0;
        $this->set('userDocuments', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->UserDocument->exists($id)) {
            throw new NotFoundException(__('Invalid user document'));
        }
        $options = array('conditions' => array('UserDocument.' . $this->UserDocument->primaryKey => $id));
        $this->set('userDocument', $this->UserDocument->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            //getting doc and user info
            $uid = AuthComponent::user("id");
            $doc = $this->request->data;

            //check
            
            //upload document to the webroot
            if ($doc["size"] > 0) {
                $doc["dir"] = WWW_ROOT . "users" . DS . $uid;
                move_uploaded_file($docs["tmp_name"], $docs["dir"]);                
            } else {
                $this->Session->setFlash(__('The user document could not be saved. Please, try again.'));
            }
            
            //adding database record
            $this->UserDocument->create();
            if ($this->UserDocument->save($this->request->data)) {
                $this->Session->setFlash(__('The user document has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user document could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserDocument->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->UserDocument->exists($id)) {
            throw new NotFoundException(__('Invalid user document'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UserDocument->save($this->request->data)) {
                $this->Session->setFlash(__('The user document has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user document could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UserDocument.' . $this->UserDocument->primaryKey => $id));
            $this->request->data = $this->UserDocument->find('first', $options);
        }
        $users = $this->UserDocument->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->UserDocument->id = $id;
        if (!$this->UserDocument->exists()) {
            throw new NotFoundException(__('Invalid user document'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UserDocument->delete()) {
            $this->Session->setFlash(__('The user document has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user document could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
