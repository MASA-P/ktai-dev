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
App::import('Vendor', 'ecw/Lib3gkTools');
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
	
	function testAutoConvert(){
		
		$carrier = Lib3gkCarrier::get_instance();
		$carrier->_carrier = KTAI_CARRIER_KDDI;
		$tools = Lib3gkTools::get_instance();
		
		$text = 'Ｋｔａｉ　Ｌｉｂｒａｒｙのテスト０１２３';
		$copyright = 'ECWorks';
		
		//通常のレンダリング
		//
		$this->ktai->options = array_merge($this->ktai->options, array(
			'use_binary_emoji' => true, 
			'output_convert_kana' => 'knrs', 
			'output_auto_convert_emoji' => true, 
			'input_encoding' => KTAI_ENCODING_UTF8, 
			'output_encoding' => KTAI_ENCODING_SJISWIN, 
		));
		
		$str = mb_convert_encoding($text, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		$str = mb_convert_kana($str, 'knrs', KTAI_ENCODING_SJISWIN);
		$emoji = $tools->int2str(0xf485);
		
		$this->controller->output = '';
		$html = $this->controller->render('autoconv');
		
		$this->assertTrue(preg_match('/'.$str.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji.'/', $html));
		$this->assertTrue(preg_match('/'.$copyright.'/', $html));
		
		//レイアウトの無い場合のレンダリング
		//
		$this->controller->output = '';
		$html = $this->controller->render('autoconv', false);
		
		$this->assertTrue(preg_match('/'.$str.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji.'/', $html));
		$this->assertFalse(preg_match('/'.$copyright.'/', $html));
		
		//数値文字参照を用いる場合
		//
		$this->controller->ktai = array_merge($this->controller->ktai, array(
			'use_binary_emoji' => false, 
		));
		
		$emoji = '&#62597;';
		
		$this->controller->output = '';
		$html = $this->controller->render('autoconv');
		
		$this->assertTrue(preg_match('/'.$str.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji.'/', $html));
		
		//かな変換をしない場合
		//
		$this->controller->ktai = array_merge($this->controller->ktai, array(
			'output_convert_kana' => false, 
		));
		
		$str = mb_convert_encoding($text, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		
		$this->controller->output = '';
		$html = $this->controller->render('autoconv');
		
		$this->assertTrue(preg_match('/'.$str.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji.'/', $html));
		
		//絵文字の自動変換はしないけどエンコード変換をする場合
		//
		$this->controller->ktai = array_merge($this->controller->ktai, array(
			'output_auto_convert_emoji' => false, 
			'output_auto_encoding' => true, 
		));
		
		$str = mb_convert_encoding($text, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		
		$this->controller->output = '';
		$html = $this->controller->render('autoconv');
		
		$this->assertTrue(preg_match('/'.$str.'/', $html));
		$this->assertFalse(preg_match('/'.$emoji.'/', $html));
		
	}
	
}
