<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {
    
    public $hasMany = array(
		'UserDocumentTag' => array(
			'className' => 'UserDocumentTag',
			'foreignKey' => 'tag_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
