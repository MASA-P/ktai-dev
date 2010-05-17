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
 * @version			0.3.1
 * @lastmodified	$Date: 2010-05-17 02:00:00 +0900 (Mon, 17 May 2010) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

App::import('Vendor', 'ecw/Lib3gkCarrier');
App::import('Controller', 'KtaiTests');

App::import('Helper', 'Ktai');

class KtaiHelperTest extends CakeTestCase {
	var $controller = null;
	var $view       = null;
	var $ktai       = null;
	
	function start(){
		
		Router::reload();
		$this->controller = new KtaiTestsController();
		$this->controller->constructClasses();
		$this->controller->Component->initialize($this->controller);
		$this->controller->Component->startup($this->controller);
		
		//一度コントローラを作り、render()を走らせてヘルパーを初期化させる
		//
		$this->controller->render('index');
		$this->view = ClassRegistry::getObject('View');
		$this->ktai =& $this->view->loaded['ktai'];
	}
	
	function stop(){
		unset($this->view);
		unset($this->controller);
		ClassRegistry::flush();
	}
	
	function testInitialize(){
		$this->assertEqual($this->ktai->options['img_emoji_url'], "/img/emoticons/");
	}
	
	function testImage(){
		$url = array('controller' => 'mypages', 'acton' => 'index');
		$htmlAttributes = array('width' => 20, 'height' => 20);
		$result = $this->ktai->image($url, $htmlAttributes);
		$this->assertTrue(preg_match('/width="20"/', $result));
		$this->assertTrue(preg_match('/height="20"/', $result));
	}
	function testLink(){
		
		$carrier = Lib3gkCarrier::get_instance();
		
		$this->ktai->options['use_img_emoji'] = false;
		$carrier->_carrier = KTAI_CARRIER_UNKNOWN;
		$title = 'Ktai Libraryテスト';
		$url = array('controller' => 'mypages', 'acton' => 'index');
		$htmlAttributes = array('accesskey' => 1);
		$result = $this->ktai->link($title, $url, $htmlAttributes);
		$this->assertTrue(preg_match('/accesskey="1"/', $result));
		$this->assertTrue(preg_match('/^\[1\]/', $result));
		
		$carrier->_carrier = KTAI_CARRIER_DOCOMO;
		$result = $this->ktai->link($title, $url, $htmlAttributes);
		$this->assertTrue(preg_match('/^\xee\x9b\xa2/', $result));
		
		$this->ktai->options['use_img_emoji'] = true;
		$carrier->_carrier = KTAI_CARRIER_UNKNOWN;
		$result = $this->ktai->link($title, $url, $htmlAttributes);
		$this->assertTrue(preg_match('/^<img src="\/img\/emoticons\/one.gif"/', $result));
		
		$carrier->_carrier = KTAI_CARRIER_DOCOMO;
		$result = $this->ktai->link($title, $url, $htmlAttributes);
		$this->assertTrue(preg_match('/^\xee\x9b\xa2/', $result));
		
	}
	
}
