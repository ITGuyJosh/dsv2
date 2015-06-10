<?php
App::uses('UserDocument', 'Model');

/**
 * UserDocument Test Case
 *
 */
class UserDocumentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_document',
		'app.user',
		'app.group',
		'app.group_document',
		'app.user_document_tag',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserDocument = ClassRegistry::init('UserDocument');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDocument);

		parent::tearDown();
	}

}
