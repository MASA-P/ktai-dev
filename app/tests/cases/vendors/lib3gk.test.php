<?php
/**
 * Ktai library, supports Japanese mobile phone sites coding.
 * It provides many functions such as a carrier check to use Referer or E-mail, 
 * conversion of an Emoji, and more.
 *
 * PHP versions 4 and 5
 *
 * Ktai Library for CakePHP
 * Copyright 2009-2010, ECWorks.
 
 * Licensed under The GNU General Public Licence
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright		Copyright 2009-2010, ECWorks.
 * @link			http://www.ecworks.jp/ ECWorks.
 * @version			0.4.0
 * @lastmodified	$Date: 2010-11-30 03:00:00 +0900 (Tue, 30 Nov 2010) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

App::import('Vendor', 'Lib3gk');

class TestLib3gk extends CakeTestCase {

	var $Lib3gk = null;
	
	function start(){
		$this->Lib3gk = new Lib3gk();
		$this->Lib3gk->initialize();
	}
	
	function stop(){
		$this->Lib3gk->shutdown();
	}
	
	function testGetVersion(){
		$str = $this->Lib3gk->get_version();
		$this->assertEqual($str, '0.4.0');
	}
	
	function testGetIpCarrier(){
		$result = $this->Lib3gk->get_ip_carrier();
		$this->assertTrue(is_integer($result));
	}
	
}
