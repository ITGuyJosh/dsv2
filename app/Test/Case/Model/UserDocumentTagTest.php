<?php
App::uses('UserDocumentTag', 'Model');

/**
 * UserDocumentTag Test Case
 *
 */
class UserDocumentTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_document_tag',
		'app.user_document',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserDocumentTag = ClassRegistry::init('UserDocumentTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDocumentTag);

		parent::tearDown();
	}

}
