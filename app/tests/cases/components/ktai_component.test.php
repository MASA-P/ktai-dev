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

App::import('Vendor', 'ecw/Lib3gkCarrier');
App::import('Vendor', 'ecw/Lib3gkTools');
App::import('Controller', 'KtaiTests');

App::import('Component', 'Ktai');

class KtaiComponentTest extends CakeTestCase {
	var $controller = null;
	var $view       = null;
	var $ktai       = null;
	
	var $security_level = 'high';
	
	function start(){
		
		$carrier = Lib3gkCarrier::get_instance();
		$carrier->_carrier = KTAI_CARRIER_DOCOMO;
		
		Router::reload();
		$this->controller = new KtaiTestsController();
		$this->controller->constructClasses();
		
		Configure::write('Security.level', $this->security_level);
		
		$this->controller->Component->initialize($this->controller);
		$this->controller->Component->startup($this->controller);
		
		$this->ktai = &$this->controller->Ktai;
	}
	
	function stop(){
		unset($this->view);
		unset($this->controller);
		ClassRegistry::flush();
	}
	
	function testInitialize(){
		
		$security_level = Configure::read('Security.level');
		$this->assertEqual($security_level, 'medium');
		
		$this->assertEqual($this->ktai->_options['use_img_emoji'], $this->controller->ktai['use_img_emoji']);
		$this->controller->ktai['use_img_emoji'] = false;
		$this->assertEqual($this->ktai->_options['use_img_emoji'], $this->controller->ktai['use_img_emoji']);
		$this->assertEqual($this->ktai->_options['img_emoji_url'], "/img/emoticons/");
	}
	
	function testAutoConvert(){
		
		$carrier = Lib3gkCarrier::get_instance();
		$carrier->_carrier = KTAI_CARRIER_KDDI;
		$tools = Lib3gkTools::get_instance();
		
		$title = 'Ｋｔａｉ　Ｌｉｂｒａｒｙ　テスト中';
		$text  = 'Ａｕｔｏ　Ｃｏｎｖｅｒｔテスト０１２３';
		
		//通常のレンダリング
		//
		$this->ktai->_options = array_merge($this->ktai->_options, array(
			'use_binary_emoji' => true, 
			'output_convert_kana' => 'knrs', 
			'output_auto_convert_emoji' => true, 
			'input_encoding' => KTAI_ENCODING_UTF8, 
			'output_encoding' => KTAI_ENCODING_SJISWIN, 
		));
		
		$str_title = mb_convert_encoding($title, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		$str_title = mb_convert_kana($str_title, 'knrs', KTAI_ENCODING_SJISWIN);
		$str_text = mb_convert_encoding($text, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		$str_text = mb_convert_kana($str_text, 'knrs', KTAI_ENCODING_SJISWIN);
		$emoji_text1 = $tools->int2str(0xf485);
		$emoji_text2 = $tools->int2str(0xf7e6);
		
		$this->controller->output = '';
		$this->controller->render('autoconv');
		$this->controller->Component->shutdown($this->controller);
		$html = $this->controller->output;
		
		$this->assertTrue(preg_match('/'.$str_title.'/', $html));
		$this->assertTrue(preg_match('/'.$str_text.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text1.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text2.'/', $html));
		
		//レイアウトの無い場合のレンダリング
		//
		$this->controller->output = '';
		$this->controller->render('autoconv', false);
		$this->controller->Component->shutdown($this->controller);
		$html = $this->controller->output;
		
		$this->assertTrue(preg_match('/'.$str_text.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text1.'/', $html));
		
		//数値文字参照を用いる場合
		//
		$this->ktai->_options = array_merge($this->ktai->_options, array(
			'use_binary_emoji' => false, 
		));
		
		$emoji_text1 = '&#62597;';
		$emoji_text2 = '&#63462;';
		
		$this->controller->output = '';
		$this->controller->render('autoconv');
		$this->controller->Component->shutdown($this->controller);
		$html = $this->controller->output;
		
		$this->assertTrue(preg_match('/'.$str_title.'/', $html));
		$this->assertTrue(preg_match('/'.$str_text.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text1.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text2.'/', $html));
		
		//かな変換をしない場合
		//
		$this->ktai->_options = array_merge($this->ktai->_options, array(
			'output_convert_kana' => false, 
		));
		
		$str_title = mb_convert_encoding($title, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		$str_text = mb_convert_encoding($text, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		
		$this->controller->output = '';
		$this->controller->render('autoconv');
		$this->controller->Component->shutdown($this->controller);
		$html = $this->controller->output;
		
		$this->assertTrue(preg_match('/'.$str_title.'/', $html));
		$this->assertTrue(preg_match('/'.$str_text.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text1.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text2.'/', $html));
		
		//絵文字の自動変換はしないけどエンコード変換をする場合
		//
		$this->ktai->_options = array_merge($this->ktai->_options, array(
			'output_auto_convert_emoji' => false, 
			'output_auto_encoding' => true, 
		));
		
		$str_title = mb_convert_encoding($title, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		$str_text = mb_convert_encoding($text, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		
		$this->controller->output = '';
		$this->controller->render('autoconv');
		$this->controller->Component->shutdown($this->controller);
		$html = $this->controller->output;
		
		$this->assertTrue(preg_match('/'.$str_title.'/', $html));
		$this->assertTrue(preg_match('/'.$str_text.'/', $html));
		$this->assertFalse(preg_match('/'.$emoji_text1.'/', $html));	//埋め込み数値参照なのでNG
		$this->assertTrue(preg_match('/'.$emoji_text2.'/', $html));		//emoji()で書いているのでOK
		
		//docomo→docomoでエンコーディングが発生する場合
		//
		$carrier->_carrier = KTAI_CARRIER_DOCOMO;
		$emoji_text1 = $tools->int2str(0xf9f8);
		$emoji_text2 = $tools->int2str(0xf8e9);
		$this->ktai->_options = array_merge($this->ktai->_options, array(
			'use_binary_emoji' => true, 
			'output_auto_convert_emoji' => true, 
			'output_auto_encoding' => true, 
		));
		
		$this->controller->output = '';
		$this->controller->render('autoconv');
		$this->controller->Component->shutdown($this->controller);
		$html = $this->controller->output;
		
		$this->assertTrue(preg_match('/'.$str_title.'/', $html));
		$this->assertTrue(preg_match('/'.$str_text.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text1.'/', $html));
		$this->assertTrue(preg_match('/'.$emoji_text2.'/', $html));
		
	}
	
	function testShutdownt(){
		
		//通常のrender結果を入手
		//
		$this->controller->ktai = array_merge($this->controller->ktai, array(
			'output_encoding' => KTAI_ENCODING_SJISWIN, 
			'use_binary_emoji' => true, 
			'output_auto_convert_emoji' => true, 
			'output_auto_encoding' => true, 
			'output_convert_kana' => 'knrs', 
		));
		$this->controller->output = null;
		$this->controller->render('autoconv', false);
		$this->controller->Component->shutdown($this->controller);
		$check = $this->controller->output;
		$this->controller->output = null;
		
		//requestAction()での結果入手
		//
		$result = $this->controller->requestAction('/ktai_tests/requested', array('return' => true));
		
		//2つの結果が異なっていればOK
		//
		$this->assertNotEqual($result, $check);
		
	}
	
}
