<?php
App::uses('GroupDocument', 'Model');

/**
 * GroupDocument Test Case
 *
 */
class GroupDocumentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.group_document',
		'app.group',
		'app.user',
		'app.user_document'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GroupDocument = ClassRegistry::init('GroupDocument');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GroupDocument);

		parent::tearDown();
	}

}
