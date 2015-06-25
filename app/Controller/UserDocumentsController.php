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
        $this->layout = "nonav";
        //getting and setting tags
        $tags = $this->UserDocument->UserDocumentTag->Tag->find("list");
        $this->set("tags", $tags);
        //user info & check
        $uid = AuthComponent::user("id");
        if (is_numeric($uid)) {
            if ($this->request->is('post')) {
                $validate = $this->UserDocument->uploadUserDocs($uid, $this->request->data["UserDocument"]);
                if ($validate["result"]) {
                    $this->Session->setFlash(__($validate["message"]));
                    return $this->redirect(array('action' => 'add'));
                } else {
                    $this->Session->setFlash(__($validate["message"]));
                }
            }
        } else {
            $this->Session->setFlash(__('You must be logged in to access that page.'));
            return $this->redirect(array("controller" => "users", "action" => "login"));
        }

        $users = $this->UserDocument->User->find('list');
        $this->set(compact('users'));
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
    public function delete($did) {
        $this->UserDocument->id = $did;
        if (!$this->UserDocument->exists()) {
            throw new NotFoundException(__('Invalid user document'));
        }
        
        //unlink file
        $this->UserDocument->deleteDoc($did);
        
        //deleting tag records
        $this->UserDocument->UserDocumentTag->deleteDocTags($did);
        
        //deleting doc record
        $this->request->allowMethod('post', 'delete');
        if ($this->UserDocument->delete()) {                        
            $this->Session->setFlash(__('The user document has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user document could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'udash'));
    }

    public function udash() {
        $this->layout = "nonav";
        $uid = AuthComponent::user("id");
        //get user documents & affilated tags
        $uDocs = $this->UserDocument->uDocs($uid);
        $this->set("uid", $uid);
        $this->set("uDocs", $uDocs);
    }

    public function download($docID) {
        $this->autoRender = FALSE;

        $path = $this->UserDocument->find("first", array(
            "conditions" => array(
                "id" => $docID
            ),
            "fields" => array(
                "dir"
            ),
            "recursive" => -1
        ));

        $this->response->file($path["UserDocument"]["dir"], array("download" => true));
    }

}
