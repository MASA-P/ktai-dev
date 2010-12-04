<?php
class CakeGroupTest extends TestSuite {
	
	var $label = 'Ktai Library codes for CakePHP';
	
	function CakeGroupTest() {
		$pluginPath = App::pluginPath('Ktai').'tests'.DS.'cases'.DS;
		TestManager::addTestCasesFromDirectory($this, $pluginPath.'controllers');
		TestManager::addTestCasesFromDirectory($this, $pluginPath.'components');
		TestManager::addTestCasesFromDirectory($this, $pluginPath.'helpers');
	}
}
