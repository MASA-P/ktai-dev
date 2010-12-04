<?php
class Lib3gkGroupTest extends TestSuite {
	
	var $label = 'Ktai Library core codes';
	
	function Lib3gkGroupTest() {
		$pluginPath = App::pluginPath('Ktai').'tests'.DS.'cases'.DS;
		TestManager::addTestCasesFromDirectory($this, $pluginPath.'vendors');
	}
}
