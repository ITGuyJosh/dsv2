<?php
/**
 * UserDocumentTagFixture
 *
 */
class UserDocumentTagFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_document_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'tag_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'users_documents_id' => array('column' => 'user_document_id', 'unique' => 0),
			'tag_id' => array('column' => 'tag_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_document_id' => 1,
			'tag_id' => 1,
			'created' => '2015-06-10 10:41:27',
			'modified' => '2015-06-10 10:41:27'
		),
	);

}
