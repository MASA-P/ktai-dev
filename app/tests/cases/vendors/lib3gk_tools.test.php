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

App::import('Vendor', 'Lib3gkCarrier');
App::import('Vendor', 'Lib3gkTools');

class TestLib3gkTools extends CakeTestCase {

	var $Lib3gkTools = null;
	
	function start(){
		$this->Lib3gkTools = new Lib3gkTools();
		$this->Lib3gkTools->initialize();
	}
	
	function stop(){
		$this->Lib3gkTools->shutdown();
	}
	
	function testInt2Str(){
		$str = $this->Lib3gkTools->int2str(0x82a0);
		$this->assertEqual($str, mb_convert_encoding('あ', 'SJIS', 'UTF-8'));
	}
	
	function testInt2Utf8(){
		$str = $this->Lib3gkTools->int2utf8(0x3042);
		$this->assertEqual($str, 'あ');
	}
	
	function testStr2Int(){
		$str = $this->Lib3gkTools->str2int(mb_convert_encoding('あ', 'SJIS', 'UTF-8'));
		$this->assertEqual($str, 0x82a0);
		$str = $this->Lib3gkTools->str2int('A');
		$this->assertEqual($str, false);
		$str = $this->Lib3gkTools->str2int(mb_convert_encoding('あi', 'SJIS', 'UTF-8'));
		$this->assertEqual($str, false);
		$str = $this->Lib3gkTools->str2int('あ');
		$this->assertEqual($str, false);
	}
	
	function testUtf82Int(){
		$str = $this->Lib3gkTools->utf82int('あ');
		$this->assertEqual($str, 0x3042);
		$str = $this->Lib3gkTools->utf82int('A');
		$this->assertEqual($str, false);
		$str = $this->Lib3gkTools->utf82int('あi');
		$this->assertEqual($str, false);
		$str = $this->Lib3gkTools->utf82int(mb_convert_encoding('あ', 'SJIS', 'UTF-8'));
		$this->assertEqual($str, false);
	}
	
	function testNormalEncodingStr(){
		$str = $this->Lib3gkTools->normal_encoding_str('Shift_JIS');
		$this->assertEqual($str, 'SJIS');
	}
	
	function testMailto(){
		
		$carrier = Lib3gkCarrier::get_instance();
		
		$title   = 'テストメール';
		$to      = 'test@example.com';
		$subject = 'testmailです';
		$body    = "テストmailです\r\nKtai Libraryからメールを送信しています";
		
		//testing for PC, docomo, kddi, emobile, iPhone
		//
		$s = urlencode(mb_convert_encoding($subject, 'SJIS', 'UTF-8'));
		$b = urlencode(mb_convert_encoding($body, 'SJIS', 'UTF-8'));
		$str_check = '<a href="mailto:'.$to.'?subject='.$s.'&body='.$b.'">'.$title.'</a>';
		
		$carrier->_carrier = KTAI_CARRIER_UNKNOWN;
		$str = $this->Lib3gkTools->mailto($title, $to, $subject, $body, null, null, false);
		$this->assertEqual($str, $str_check);
		
		$carrier->_carrier = KTAI_CARRIER_DOCOMO;
		$str = $this->Lib3gkTools->mailto($title, $to, $subject, $body, null, null, false);
		$this->assertEqual($str, $str_check);
		
		$carrier->_carrier = KTAI_CARRIER_KDDI;
		$str = $this->Lib3gkTools->mailto($title, $to, $subject, $body, null, null, false);
		$this->assertEqual($str, $str_check);
		
		$carrier->_carrier = KTAI_CARRIER_EMOBILE;
		$str = $this->Lib3gkTools->mailto($title, $to, $subject, $body, null, null, false);
		$this->assertEqual($str, $str_check);
		
		//testing for SoftBank, iPhone
		//
		$s = urlencode($subject);
		$b = urlencode($body);
		$str_check = '<a href="mailto:'.$to.'?subject='.$s.'&body='.$b.'">'.$title.'</a>';
		
		$carrier->_carrier = KTAI_CARRIER_SOFTBANK;
		$str = $this->Lib3gkTools->mailto($title, $to, $subject, $body, null, null, false);
		$this->assertEqual($str, $str_check);
		
		//testing for iPhone
		//
		$s = $subject;
		$b = mb_ereg_replace("\n", "%0D%0A", mb_ereg_replace("\r", "", $body));
		$str_check = '<a href="mailto:'.$to.'?subject='.$s.'&body='.$b.'">'.$title.'</a>';
		
		$carrier->_carrier = KTAI_CARRIER_IPHONE;
		$str = $this->Lib3gkTools->mailto($title, $to, $subject, $body, null, null, false);
		$this->assertEqual($str, $str_check);
		
	}
	
	function testGetUid(){
		
		$carrier = Lib3gkCarrier::get_instance();
		
		//#28 softbank jphoneの端末ID取得時にエラー
		//
		$carrier->_carrier = KTAI_CARRIER_SOFTBANK;
		$str = $this->Lib3gkTools->get_uid();
		$this->assertFalse($str);		//PCでは必ずfalseになるのでエラーが出ないことだけを確認
	}
	
}
