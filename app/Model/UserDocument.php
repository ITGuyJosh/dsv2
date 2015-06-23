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

    function uploadUserDocs($uid, $postdata) {

        $tmp_name = $postdata["Documents"]["tmp_name"];
        $file_name = $postdata["Documents"]["name"];
        $file_size = $postdata["Documents"]["size"];

        $movedir = WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "docs" . DS . $file_name;
        $savedir = "files" . DS . "users" . DS . $uid . DS . "docs" . DS . $file_name;
        $arcmove = WWW_ROOT . "files" . DS . "users" . DS . $uid . DS . "archive" . DS;
        $arcsave = "files" . DS . "users" . DS . $uid . DS . "archive" . DS;

        //file size check
        if ($file_size >= 10000000) {
            $message['message'] = "The document is too big, please reduce to 10MB or less and try again.";
            $message['result'] = false;
            return $message;
        } else {
            //adding new document & record            
            if (!file_exists($movedir)) {
                //upload doc
                move_uploaded_file($tmp_name, $movedir);
                //create record
                $this->create();
                $this->save(array(
                    "UserDocument" => array(
                        "user_id" => $uid,
                        "name" => $file_name,
                        "dir" => $savedir,
                        "ver" => 1
                    )
                ));

                //tag info & save
                $tags = $postdata["Tags"];
                $docID = $this->id;
                $this->UserDocumentTag->saveDocTags($tags, $docID);
                
                //message and redirect
                $message['message'] = 'The  document has been saved.';
                $message['result'] = true;
                return $message;

            //moving old document, updating its db entry, saving new, adding new entry
            } elseif (file_exists($movedir)) {

                $ver = $this->find("all", array(
                    "conditions" => array(
                        "dir" => $savedir
                    ),
                    "recursive" => -1
                ));
                
                //old version
                $ver = $ver[0]["UserDocument"]["ver"];
                //new version
                $newver = $ver + 1;
                
                //set new location and update version number
                $arcmove = $arcmove . $ver . "-" . $file_name;
                $arcsave = $arcsave . $ver . "-" . $file_name;
                
                //adding additional backslashes to sql because of how cakephp is handling it
                $arcsave = str_replace('\\', '\\\\', $arcsave);
                
                //update record & editing the filename, set version as 2               
                $this->updateAll(array(
                    "UserDocument.dir" => "'$arcsave'",
                    "UserDocument.ver" => "'$ver'"
                        ), array(
                    "UserDocument.dir" => $savedir
                ));
                
                //move old document to archive                
                rename($movedir, $arcmove);
                
                //upload new file
                move_uploaded_file($tmp_name, $movedir);
                
                //add new record and set version as 1
                $this->create();
                $this->save(array(
                    "UserDocument" => array(
                        "user_id" => $uid,
                        "name" => $file_name,
                        "dir" => $savedir,
                        "ver" => $newver
                    )
                ));
                $message['message'] = 'The document has been saved and the previous version has been moved to your archive.';
                $message['result'] = true;
                return $message;
            } else {
                $message['message'] = 'The document could not be saved. Please, try again or contact your systems administrator.';
                $message['result'] = false;
                return $message;
            }
        }
    }

}
