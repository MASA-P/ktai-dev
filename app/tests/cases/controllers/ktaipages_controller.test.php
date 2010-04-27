<?php
/**
 * Ktai library, supports Japanese mobile phone sites coding.
 * It provides many functions such as a carrier check to use Referer or E-mail, 
 * conversion of an Emoji, and more.
 *
 * PHP versions 4 and 5
 *
 * Ktai Library for CakePHP1.2
 * Copyright 2009-2010, ECWorks.
 
 * Licensed under The GNU General Public Licence
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright		Copyright 2009-2010, ECWorks.
 * @link			http://www.ecworks.jp/ ECWorks.
 * @version			0.3.0
 * @lastmodified	$Date: 2010-04-27 12:00:00 +0900 (Thu, 27 Apr 2010) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

App::import('Vendor', 'ecw/Lib3gkCarrier');
App::import('Controller', 'Ktaipages');

class TestKtaiPagesController extends CakeTestCase {
	
	var $carrier   = null;
	var $Ktaipages = null;
	
	function start(){
		$this->carrier = Lib3gkCarrier::get_instance();
		$this->carrier->_carrier = KTAI_CARRIER_DOCOMO;
		
		$this->Ktaipages = new KtaipagesController();
		$this->Ktaipages->constructClasses();
		$this->Ktaipages->Component->initialize($this->Ktaipages);
		$this->Ktaipages->Component->startup($this->Ktaipages);
	}
	
	function stop(){
		unset($this->Ktaipages);
		ClassRegistry::flush();
	}
	
	function testIndex(){
		$url = array(
			'controller' => 'ktaipages', 
			'action' => 'index', 
		);
		
		$test_url = $this->Ktaipages->__redirect_url($url);
		$result = is_array($test_url) && 
			$test_url['controller'] == 'ktaipages' && 
			$test_url['action'] == 'index' && 
			isset($test_url['?']['csid']);
		$this->assertTrue($result);
		
		$url['?'] = array('testvalue' => 5);
		$test_url = $this->Ktaipages->__redirect_url($url);
		$result = is_array($test_url) && 
			$test_url['controller'] == 'ktaipages' && 
			$test_url['action'] == 'index' && 
			isset($test_url['?']['csid']) && 
			$test_url['?']['testvalue'] == 5;
		$this->assertTrue($result);
		
		$url = '/ktaipages/index/5';
		$test_url = $this->Ktaipages->__redirect_url($url);
		$result = is_array($test_url) && 
			$test_url['controller'] == 'ktaipages' && 
			$test_url['action'] == 'index' && 
			isset($test_url['?']['csid']) && 
			$test_url['pass'][0] == 5;
		$this->assertTrue($result);
		
		$url = 'http://www.google.com/';
		$test_url = $this->Ktaipages->__redirect_url($url);
		$this->assertEqual($test_url, $url);
		
	}
}
