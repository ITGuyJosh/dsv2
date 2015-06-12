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
            $doc = $this->request->data["UserDocument"]["Documents"];
            $tmp_name = $doc["tmp_name"];
            $file_name = $doc["name"];
            $file_size = $doc["size"];
            $docsdir = WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "docs" . DS;
            $arcdir = WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "archive" . DS;
            $target = $docsdir . $file_name;

            if ($file_size >= 10000000) {
                $this->Session->setFlash(__('The document is too large. Please ensure it is under 10MB and try again.'));
                return $this->redirect(array('action' => 'add'));                                
            } else {
                //adding new document & record            
                if (!file_exists($target)) {
                    //upload doc
                    move_uploaded_file($tmp_name, $target);
                    //create record
                    $this->UserDocument->create();
                    $this->UserDocument->save(array(
                        "UserDocument" => array(
                            "user_id" => $uid,
                            "name" => $file_name,
                            "dir" => $target,
                            "ver" => 1
                        )
                    ));
                    //message and redirect
                    $this->Session->setFlash(__('The user document has been saved.'));
                    //return $this->redirect(array('action' => 'index'));
                    
                //moving old document, updating its db entry, saving new, adding new entry
                } elseif (file_exists($target)) {
                    
                    $ver = $this->UserDocument->find("all", array(
                        "conditions" => array(
                            "dir" => $target
                        ),
                        "recursive" => -1
                    )); 
                    $ver = $ver[0]["UserDocument"]["ver"];
                    
                    
                    //set new location and update version number
                    $target2 = $arcdir . $ver . "-" . $file_name;
                    //adding additional backslashes to sql because of how cakephp is handling it
                    $target2 = str_replace('\\', '\\\\', $target2);

                    //update record & editing the filename, set version as 2               
                    $this->UserDocument->updateAll(array(
                        "UserDocument.dir" => "'$target2'",
                        "UserDocument.ver" => "'$ver'"
                            ), array(
                        "UserDocument.dir" => $target
                    ));
                    //move old document to archive
                    rename($target, $target2);
                    //upload new file
                    move_uploaded_file($tmp_name, $target);
                    //new version
                    $newver = $ver + 1;
                    //add new record and set version as 1
                    $this->UserDocument->create();
                    $this->UserDocument->save(array(
                        "UserDocument" => array(
                            "user_id" => $uid,
                            "name" => $file_name,
                            "dir" => $target,
                            "ver" => $newver
                        )
                    ));
                    $this->Session->setFlash(__('The document has been saved and the previous version has been moved to your archive.'));
                } else {
                    $this->Session->setFlash(__('The document could not be saved. Please, try again or contact your systems administrator.'));
                }
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
