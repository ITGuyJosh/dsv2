<?php
App::uses('AppController', 'Controller');
/**
 * UserDocumentTags Controller
 *
 * @property UserDocumentTag $UserDocumentTag
 * @property PaginatorComponent $Paginator
 */
class UserDocumentTagsController extends AppController {

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
		$this->UserDocumentTag->recursive = 0;
		$this->set('userDocumentTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserDocumentTag->exists($id)) {
			throw new NotFoundException(__('Invalid user document tag'));
		}
		$options = array('conditions' => array('UserDocumentTag.' . $this->UserDocumentTag->primaryKey => $id));
		$this->set('userDocumentTag', $this->UserDocumentTag->find('first', $options));                
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserDocumentTag->create();
			if ($this->UserDocumentTag->save($this->request->data)) {
				$this->Session->setFlash(__('The user document tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user document tag could not be saved. Please, try again.'));
			}
		}
		$userDocuments = $this->UserDocumentTag->UserDocument->find('list');
		$tags = $this->UserDocumentTag->Tag->find('list');
		$this->set(compact('userDocuments', 'tags'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserDocumentTag->exists($id)) {
			throw new NotFoundException(__('Invalid user document tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserDocumentTag->save($this->request->data)) {
				$this->Session->setFlash(__('The user document tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user document tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserDocumentTag.' . $this->UserDocumentTag->primaryKey => $id));
			$this->request->data = $this->UserDocumentTag->find('first', $options);
		}
		$userDocuments = $this->UserDocumentTag->UserDocument->find('list');
		$tags = $this->UserDocumentTag->Tag->find('list');
		$this->set(compact('userDocuments', 'tags'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserDocumentTag->id = $id;
		if (!$this->UserDocumentTag->exists()) {
			throw new NotFoundException(__('Invalid user document tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserDocumentTag->delete()) {
			$this->Session->setFlash(__('The user document tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user document tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
