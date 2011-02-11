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

App::import('Vendor', 'Lib3gkHtml');

class TestLib3gkHtml extends CakeTestCase {

	var $Lib3gkHtml = null;
	
	function start(){
		$this->Lib3gkHtml = new Lib3gkHtml();
		$this->Lib3gkHtml->initialize();
	}
	
	function stop(){
		$this->Lib3gkHtml->shutdown();
	}
	
	function testUrl(){
		$str = './" /><script language="javascript">alert("test");</script><img src="./';
		$check = htmlspecialchars($str);
		$result = $this->Lib3gkHtml->url($str);
		$this->assertTrue($check, $result);
	}
	
	function testImage(){
	
		$str = './img/cake.icon.png';
		$check = $str;
		$result = $this->Lib3gkHtml->image($str, array('width' => 20, 'height' => 20));
		$check = '<img src="./img/cake.icon.png" width="20" height="20">';
		$this->assertEqual($check, $result);
		
		$carrier = Lib3gkCarrier::get_instance();
		$carrier->get_carrier('SoftBank/1.0/940SH/SHJ001[/Serial] Browser/NetFront/3.5 Profile/MIDP-2.0 Configuration/CLDC-1.1', true);
		$check = '<img src="./img/cake.icon.png" width="40" height="40">';
		$result = $this->Lib3gkHtml->image($str, array('width' => 20, 'height' => 20));
		$this->assertEqual($check, $result);
	}
	
	function testStretchImageSize(){
	
		$carrier = Lib3gkCarrier::get_instance();
		
		$width  = 20;
		$height = 40;
		$default_width  = 240;
		$default_height = 320;
		
		$carrier->get_carrier('', true);
		list($result_width, $result_height) = $this->Lib3gkHtml->stretch_image_size($width, $height, $default_width, $default_height);
		$this->assertEqual($result_width,  20);
		$this->assertEqual($result_height, 40);
		
		$carrier->get_carrier('SoftBank/1.0/940SH/SHJ001[/Serial] Browser/NetFront/3.5 Profile/MIDP-2.0 Configuration/CLDC-1.1', true);
		list($result_width, $result_height) = $this->Lib3gkHtml->stretch_image_size($width, $height, $default_width, $default_height);
		$this->assertEqual($result_width,  40);
		$this->assertEqual($result_height, 80);
	}
	function testStyle(){
		$style = 'color: #ffffff;';
		$this->Lib3gkHtml->_params['style']['test'] = $style;
		$result = $this->Lib3gkHtml->style('test', false);
		$this->assertEqual($result, $style);
	}
	
	function testGetQrcode(){
		$str = 'Ktai Library';
		$result = $this->Lib3gkHtml->get_qrcode($str);
		$this->assertTrue(preg_match('/Ktai Library/', $result));
	}
	
	function testGetStaticMaps(){
		
		$carrier = Lib3gkCarrier::get_instance();
		$carrier->get_carrier('', true);
		
		$lat = '-12.3456';
		$lon = '12.3456';
		$options = array(
			'markers' => array(
				array('-12.3456', '12.3456', 'mid', 'red', '1'), 
				array('-34.5678', '34.5678', 'tiny', 'blue', 'a'), 
				array('-56.7890', '56.7890', 'green', null), 
			), 
			'path' => array(
				'rgb'    => '0xff0000', 
				'weight' => '1', 
				'points' => array(
					array('-12.3456', '12.3456'), 
					array('-34.5678', '34.5678'), 
					array('-56.7890', '56.7890'), 
				), 
			), 
			'span' => array(100, 100), 
		);
		$this->Lib3gkHtml->_params['google_api_key'] = '0123456789';
		$result = $this->Lib3gkHtml->get_static_maps($lat, $lon, $options);
	}
	
	function testFont(){
		$carrier = Lib3gkCarrier::get_instance();
		$carrier->get_carrier('', true);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual(null, $result);
		
		$result = $this->Lib3gkHtml->font();
		$this->assertEqual(null, $result);
		
		$user_agent = 'DoCoMo/2.0 P906i(c100;TB;W24H15)';
		$carrier->get_carrier($user_agent, true);
		$this->Lib3gkHtml->_params['use_xml'] = false;
		$this->Lib3gkHtml->_params['style'] = array(
			'teststyle' => 'color: red;', 
		);
		$result = $this->Lib3gkHtml->font();
		$this->assertEqual(null, $result);
		
		$result = $this->Lib3gkHtml->_params['use_xml'] = true;
		$result = $this->Lib3gkHtml->font();
		$this->assertEqual('<div style="font-size: medium;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, 'div');
		$this->assertEqual('<div style="font-size: medium;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, null, 'teststyle');
		$this->assertEqual('<div style="font-size: medium;color: red;">', $result);
		
		$user_agent = 'KDDI-KC3Z UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0';
		$carrier->get_carrier($user_agent, true);
		$result = $this->Lib3gkHtml->font();
		$this->assertEqual('<font style="font-size: 22px;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, 'div');
		$this->assertEqual('<div style="font-size: 22px;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, null, 'teststyle');
		$this->assertEqual('<font style="font-size: 22px;color: red;">', $result);
		
		$user_agent = 'SoftBank/1.0/840SH/SHJ001/0123456789 Browser/NetFront/3.5 Profile/MIDP-2.0 Configuration/CLDC-1.1';
		$carrier->get_carrier($user_agent, true);
		$result = $this->Lib3gkHtml->font();
		$this->assertEqual('<font style="font-size: medium;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, 'div');
		$this->assertEqual('<div style="font-size: medium;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, null, 'teststyle');
		$this->assertEqual('<font style="font-size: medium;color: red;">', $result);
		
		$user_agent = 'SoftBank/2.0/945SH/SHJ001/0123456789 Browser/NetFront/3.5 Profile/MIDP-2.0 Configuration/CLDC-1.1';
		$carrier->get_carrier($user_agent, true);
		$result = $this->Lib3gkHtml->font();
		$this->assertEqual('<font style="font-size: large;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, 'div');
		$this->assertEqual('<div style="font-size: large;">', $result);
		
		$result = $this->Lib3gkHtml->font(null, null, 'teststyle');
		$this->assertEqual('<font style="font-size: large;color: red;">', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</font>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</div>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</font>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</font>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</div>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</font>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</font>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</div>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</font>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</div>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</div>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual('</div>', $result);
		
		$result = $this->Lib3gkHtml->fontend();
		$this->assertEqual(null, $result);
		
	}
	
}
