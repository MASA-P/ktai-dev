<?php
class CakeGroupTest extends TestSuite {
	
	var $label = 'Ktai Library codes for CakePHP';
	
	function CakeGroupTest() {
		TestManager::addTestCasesFromDirectory($this, APP_TEST_CASES.DS.'controllers');
		TestManager::addTestCasesFromDirectory($this, APP_TEST_CASES.DS.'components');
		TestManager::addTestCasesFromDirectory($this, APP_TEST_CASES.DS.'helpers');
	}
}
