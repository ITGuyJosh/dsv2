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
            $tmp_name = $this->request->data["UserDocument"]["Documents"]["tmp_name"];
            $file_name = $this->request->data["UserDocument"]["Documents"]["name"];            
            $docsdir = WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "docs" . DS;
            $arcdir = WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "archive" . DS;
            $target = $docsdir . $file_name;
            
            
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
            } elseif(file_exists($target)) {                                
                //get current version
                $ver = $this->UserDocument->find("first", array(
                    "conditions" => array(
                        "dir" => $target
                    ),
                    "recursive" => -1
                ));
                $ver = $ver["UserDocument"]["ver"];
                //set new location with old version number
                $archive = $arcdir . "[archived]" . $file_name;
                //update record & editing the filename                
                $this->UserDocument->updateAll(array(
                    "UserDocument.dir" => "'$archive'",
                ), array(
                    "UserDocument.dir" => "'$target'"
                ));
                //move old document to archive
                rename($target, $archive);
                //upload new file
                move_uploaded_file($tmp_name, $target);
                //iterating version for new record
                $ver = $ver++;
                //add new record & update version
                $this->UserDocument->create();
                $this->UserDocument->save(array(
                    "UserDocument" => array(
                        "user_id" => $uid,
                        "name" => $file_name,
                        "dir" => $target,
                        "ver" => $ver
                    )
                ));                
                $this->Session->setFlash(__('The document has been saved and the previous version has been moved to your archive.'));
            } else {
                $this->Session->setFlash(__('The document could not be saved. Please, try again or contact your systems administrator.'));
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
