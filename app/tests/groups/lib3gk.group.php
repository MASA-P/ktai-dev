<?php
class Lib3gkGroupTest extends TestSuite {
	
	var $label = 'Ktai Library core codes';
	
	function Lib3gkGroupTest() {
		TestManager::addTestCasesFromDirectory($this, APP_TEST_CASES.DS.'vendors');
	}
}
