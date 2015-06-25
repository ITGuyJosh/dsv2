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

    public function findGroupDocs($uid) {
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

    public function uploadGroupDocs($postdata) {

        $gid = $postdata["group_id"];
        $tmp_name = $postdata["Documents"]["tmp_name"];
        $file_name = $postdata["Documents"]["name"];
        $file_size = $postdata["Documents"]["size"];

        $movedir = WWW_ROOT . "files" . DS . "groups" . DS . $gid . DS . $file_name;
        $savedir = "files" . DS . "groups" . DS . $gid . DS . $file_name;        

        //file size check
        if ($file_size >= 10000000) {
            $message['message'] = "The document is too big, please reduce to 10MB or less and try again.";
            $message['result'] = false;
            return $message;
        } else {
            //moving the file from tmp to upload directory
            if (move_uploaded_file($tmp_name, $movedir)) {
                //save record to database
                $this->create();
                $this->save(array(
                    "GroupDocument" => array(
                        "group_id" => $gid,
                        "name" => $file_name,
                        "dir" => $savedir,
                        "ver" => null
                    )
                ));

                $message['message'] = 'The group document has been saved.';
                $message['result'] = true;
                return $message;
            } else {
                $message['message'] = "The document could not be uploaded. Please try again or contact the system administrator.";
                $message['result'] = false;
                return $message;
            }
        }
    }
    
    public function deleteGroupDoc($gid){
        $gDoc = $this->find("all", array(
            "conditions" => array(
                "GroupDocument.id" => $gid
            )
        ));
        
        unlink($gDoc[0]["GroupDocument"]["dir"]);
        
        return true;
    }

}
