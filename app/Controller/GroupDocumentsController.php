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

        $uid = AuthComponent::user("id");

        if ($this->request->is('post')) {
            //uploading document and returning if it passed/failed with a message
            $validate = $this->GroupDocument->uploadGroupDocs($this->request->data["GroupDocument"]);
            if ($validate['result']) {
                $this->Session->setFlash(__($validate["message"]));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__($validate["message"]));
                return $this->redirect(array('action' => 'add'));
            }
        }
        $groups = $this->GroupDocument->Group->find('list');
        $this->set(compact('groups'));
        $this->set("uid", $uid);
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
    public function delete($gid) {
        $this->GroupDocument->id = $gid;
        if (!$this->GroupDocument->exists()) {
            throw new NotFoundException(__('Invalid group document'));
        }
        
        $this->GroupDocument->deleteGroupDoc($gid);
        
        $this->request->allowMethod('post', 'delete');
        if ($this->GroupDocument->delete()) {
            $this->Session->setFlash(__('The group document has been deleted.'));
        } else {
            $this->Session->setFlash(__('The group document could not be deleted. Please, try again.'));
        }
        return $this->redirect(array("controller" => "groups", 'action' => 'index'));
    }

    public function ugroup($uid) {
        $this->layout = "nonav";

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

    public function download($gID) {
        $this->autoRender = FALSE;

        $path = $this->GroupDocument->find("first", array(
            "conditions" => array(
                "id" => $gID
            ),
            "fields" => array(
                "dir"
            ),
            "recursive" => -1
        ));

        $this->response->file($path["GroupDocument"]["dir"], array("download" => true));
    }

}
