<?php

App::uses('AppModel', 'Model');

/**
 * UserDocumentTag Model
 *
 * @property UserDocument $UserDocument
 * @property Tag $Tag
 */
class UserDocumentTag extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'UserDocument' => array(
            'className' => 'UserDocument',
            'foreignKey' => 'user_document_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Tag' => array(
            'className' => 'Tag',
            'foreignKey' => 'tag_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function saveDocTags($tags, $docID) {
        //only saving if tags are selected
        if (!is_null($tags)) {
            foreach ($tags as $tag) {
                $this->create();
                $this->save(array(
                    "user_document_id" => $docID,
                    "tag_id" => $tag
                ));
            }
        }
    }
    
    public function deleteDocTags($did){
        
        $this->deleteAll($conditions = array("user_document_id" => $did));
        
        return true;
    }
    
    public function deleteTagDocs($tid){
        
        $this->deleteAll($conditions = array("tag_id" => $tid));
        
        return true;
    }

}
