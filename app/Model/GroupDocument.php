<?php
App::uses('AppModel', 'Model');
/**
 * GroupDocument Model
 *
 * @property Group $Group
 */
class GroupDocument extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function findGroupDocs($uid){
            //finding user group by their id
            $ugroupID = $this->Group->User->find("first", array(
                "fields" => array(
                    "group_id"
                ),
                "conditions" => array(
                    "user.id" => $uid
                )
            ));
            //finding user group docs by group_id
            $gDocs = $this->find("all", array(
                "conditions" => array(
                    "group_id" => $ugroupID["User"]["group_id"]
                )
            ));
            
            return $gDocs;
        }
        
        public function uploadGroupDocs($uid){
            
        }
}
