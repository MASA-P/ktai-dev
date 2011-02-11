<?php
/**
 * Ktai library, supports Japanese mobile phone sites coding.
 * It provides many functions such as a carrier check to use Referer or E-mail, 
 * conversion of an Emoji, and more.
 *
 * PHP versions 4 and 5
 *
 * Ktai Library for CakePHP
 * Copyright 2009-2011, ECWorks.
 
 * Licensed under The GNU General Public Licence
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright		Copyright 2009-2011, ECWorks.
 * @link			http://www.ecworks.jp/ ECWorks.
 * @version			0.4.1
 * @lastmodified	$Date: 2011-02-11 18:00:00 +0900 (Fri, 11 Feb 2011) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

App::import('Vendor', 'Lib3gkIp');

class TestLib3gkIp extends CakeTestCase {

	var $Lib3gkIp = null;
	
	function start(){
		$this->Lib3gkIp = new Lib3gkIp();
		$this->Lib3gkIp->initialize();
	}
	
	function stop(){
		$this->Lib3gkIp->shutdown();
	}
	
	function testIp2long(){
		$test_value = $this->Lib3gkIp->ip2long('12.34.56.78');
		$this->assertEqual($test_value, 0x0c22384e);
		
		$test_value = $this->Lib3gkIp->ip2long('12345678');
		$this->assertEqual($test_value, false);
	}
	
	function testIsInclusive(){
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.1', '192.168.1.0/24');
		$this->assertTrue($test_value);
		
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.1', '192.168.1.1');
		$this->assertTrue($test_value);
		
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.1', '192.168.1.2');
		$this->assertFalse($test_value);
		
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.129', '192.168.1.0/25');
		$this->assertFalse($test_value);
	}
	
	function testIp2Carrier(){
		$test_value = $this->Lib3gkIp->ip2carrier();
		$this->assertEqual($test_value, 0);
		
		$test_value = $this->Lib3gkIp->ip2carrier('192.168.1.1');
		$this->assertEqual($test_value, 0);
		
		$test_value = $this->Lib3gkIp->ip2carrier('210.153.84.1');
		$this->assertEqual($test_value, 1);
		
		$test_value = $this->Lib3gkIp->ip2carrier('210.230.128.225');
		$this->assertEqual($test_value, 2);
		
		$test_value = $this->Lib3gkIp->ip2carrier('123.108.237.1');
		$this->assertEqual($test_value, 3);
		
		$test_value = $this->Lib3gkIp->ip2carrier('117.55.1.225');
		$this->assertEqual($test_value, 4);
		
		$test_value = $this->Lib3gkIp->ip2carrier('126.240.0.1');
		$this->assertEqual($test_value, 5);
		
		$test_value = $this->Lib3gkIp->ip2carrier('61.198.128.1');
		$this->assertEqual($test_value, 6);
		
		$test_value = $this->Lib3gkIp->ip2carrier('72.14.199.1');
		$this->assertEqual($test_value, 7);
		
	}

}
