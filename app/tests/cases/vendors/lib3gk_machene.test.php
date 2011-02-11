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

App::import('Vendor', 'Lib3gkMachine');

class TestLib3gkMachine extends CakeTestCase {

	var $Lib3gkMachine = null;
	
	function start(){
		$this->Lib3gkMachine = new Lib3gkMachine();
		$this->Lib3gkMachine->initialize();
	}
	
	function stop(){
		$this->Lib3gkMachine->shutdown();
	}
	
	function testGetMachineInfo(){
		$carrier_name = 'others';
		$machine_name = 'default';
		$arr = $this->Lib3gkMachine->get_machineinfo($carrier_name, $machine_name);
		$this->assertTrue($arr['carrier_name'] == $carrier_name && $arr['machine_name'] == $machine_name);
		$this->assertFalse(isset($arr['font_size']));
		
		$carrier_name = 'Android';
		$machine_name = 'default';
		$arr = $this->Lib3gkMachine->get_machineinfo($carrier_name, $machine_name);
		$this->assertTrue($arr['carrier_name'] == $carrier_name && $arr['machine_name'] == $machine_name);
		
	}
	
	
}
