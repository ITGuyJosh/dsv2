<?php

App::uses('AppController', 'Controller');

/**
 * GroupDocuments Controller
 *
 * @property GroupDocument $GroupDocument
 * @property PaginatorComponent $Paginator
 */
class GroupDocumentsController extends AppController {

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
        $this->GroupDocument->recursive = 0;
        $this->set('groupDocuments', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->GroupDocument->exists($id)) {
            throw new NotFoundException(__('Invalid group document'));
        }
        $options = array('conditions' => array('GroupDocument.' . $this->GroupDocument->primaryKey => $id));
        $this->set('groupDocument', $this->GroupDocument->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->GroupDocument->create();
            if ($this->GroupDocument->save($this->request->data)) {
                $this->Session->setFlash(__('The group document has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The group document could not be saved. Please, try again.'));
            }
        }
        $groups = $this->GroupDocument->Group->find('list');
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
        if (!$this->GroupDocument->exists($id)) {
            throw new NotFoundException(__('Invalid group document'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->GroupDocument->save($this->request->data)) {
                $this->Session->setFlash(__('The group document has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The group document could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('GroupDocument.' . $this->GroupDocument->primaryKey => $id));
            $this->request->data = $this->GroupDocument->find('first', $options);
        }
        $groups = $this->GroupDocument->Group->find('list');
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
        $this->GroupDocument->id = $id;
        if (!$this->GroupDocument->exists()) {
            throw new NotFoundException(__('Invalid group document'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->GroupDocument->delete()) {
            $this->Session->setFlash(__('The group document has been deleted.'));
        } else {
            $this->Session->setFlash(__('The group document could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function ugroup($uid) {

        if (empty($uid)) {
            $this->Session->setFlash(__('You must be logged in to access that section.'));
            return $this->redirect(array("controller" => "users", 'action' => 'login'));
        }

        if ($this->Auth->user("id") !== $uid) {
            $this->Session->setFlash(__('You do not have appropriate credentials to access that section.'));
            return $this->redirect(array("controller" => "users", 'action' => 'login'));
        }
        
        //finding and setting user group documents to view
        $gDocs = $this->GroupDocument->findGroupDocs($uid);        
        $this->set("gDocs", $gDocs);
        
    }

}
