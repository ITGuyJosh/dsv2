<?php

App::uses('AppModel', 'Model');

/**
 * UserDocument Model
 *
 * @property User $User
 * @property UserDocumentTag $UserDocumentTag
 */
class UserDocument extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'UserDocumentTag' => array(
            'className' => 'UserDocumentTag',
            'foreignKey' => 'user_document_id',
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

    function uDocs($uid) {
        //finding all documents via user id
        $uDocs = $this->find("all", array(
            "conditions" => array(
                "user_id" => $uid
            ),
            "recursive" => 2
        ));

        //finding all tags by document id and generating an empty array called no tags if none are present
        foreach ($uDocs as $key => $value) {
            if (!empty($value['UserDocumentTag'])) {
                foreach ($value['UserDocumentTag'] as $tag) {
                    $uDocs[$key]['Tags'][] = $tag['Tag']['name'];
                }
            } else {
                $uDocs[$key]['Tags'][] = "No Tags";
            }
        }
        return $uDocs;
    }
    
    function uploadUserDocs($uid, $postdata){
        
        $tmp_name = $postdata["Documents"]["tmp_name"];
        $file_name = $postdata["Documents"]["name"];
        $file_size = $postdata["Documents"]["size"];

        $movedir = WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . $file_name;
        $savedir = DS. "files" . DS . "users" . DS . $gid . DS;
        
        
    }
}
