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

App::import('Vendor', 'Lib3gkEmoji');

App::import('Vendor', 'Lib3gkCarrier');
App::import('Vendor', 'Lib3gkTools');

class TestLib3gkEmoji extends CakeTestCase {

	var $Lib3gkEmoji = null;
	
	function start(){
		$this->Lib3gkEmoji = new Lib3gkEmoji();
		$this->Lib3gkEmoji->initialize();
		$this->Lib3gkEmoji->_params['use_emoji_cache'] = false;
	}
	
	function stop(){
		$this->Lib3gkEmoji->shutdown();
	}
	
	function testCreateImageEmoji(){
		$str = $this->Lib3gkEmoji->create_image_emoji('sun');
		$this->assertEqual($str, '<img src="./img/emoticons/sun.gif" border="0" width="16" height="16">');
	}
	
	function testEmoji(){
		
		$tools = Lib3gkTools::get_instance();
		$carrier = Lib3gkCarrier::get_instance();
		
		//PC & iPhone  emoji process test
		//
		$carrier->_carrier = KTAI_CARRIER_UNKNOWN;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_UTF8;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, '[晴]');
		$carrier->_carrier = KTAI_CARRIER_IPHONE;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, '[晴]');
		
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_SJISWIN;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, mb_convert_encoding('[晴]', 'SJIS', 'UTF-8'));
		$carrier->_carrier = KTAI_CARRIER_IPHONE;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, mb_convert_encoding('[晴]', 'SJIS', 'UTF-8'));
		
		$carrier->_carrier = KTAI_CARRIER_UNKNOWN;
		$this->Lib3gkEmoji->_params['use_img_emoji'] = true;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, '<img src="./img/emoticons/sun.gif" border="0" width="16" height="16">');
		$carrier->_carrier = KTAI_CARRIER_IPHONE;
		$this->Lib3gkEmoji->_params['use_img_emoji'] = true;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, '<img src="./img/emoticons/sun.gif" border="0" width="16" height="16">');
		
		//mobile emoji process test
		//
		$carrier->_carrier = KTAI_CARRIER_DOCOMO;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_SJISWIN;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2str(0xf89f));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2utf8(0xe63e));
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_UTF8;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2str(0xf89f));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2utf8(0xe63e));
		
		$carrier->_carrier = KTAI_CARRIER_KDDI;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_SJISWIN;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2str(0xf660));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2utf8(0xef60));
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_UTF8;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2str(0xf660));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2utf8(0xef60));
		
		//SoftBank携帯はwebコードが使えなくなったため
		//バイナリ＆数値文字参照に対応(ver0.4.2～)
		//
		$carrier->_carrier = KTAI_CARRIER_SOFTBANK;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_SJISWIN;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2str(0xf98b));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2utf8(0xe04a));
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_UTF8;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2str(0xf98b));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2utf8(0xe04a));
		
		$this->Lib3gkEmoji->_params['use_binary_emoji']  = false;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_SJISWIN;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, '&#57418;');
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, '&#xe04a;');
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_UTF8;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, '&#57418;');
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, '&#xe04a;');
		$this->Lib3gkEmoji->_params['use_binary_emoji']  = true;
		
		$carrier->_carrier = KTAI_CARRIER_EMOBILE;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_SJISWIN;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2str(0xf89f));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false);
		$this->assertEqual($str, $tools->int2utf8(0xe63e));
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_UTF8;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2str(0xf89f));
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xe63e, false);
		$this->assertEqual($str, $tools->int2utf8(0xe63e));
		
		//Numeric caracter reference process test
		//
		$carrier->_carrier = KTAI_CARRIER_DOCOMO;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_SJISWIN;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_SJISWIN;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false, null, null, false);
		$this->assertEqual($str, '&#63647;');
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		$str = $this->Lib3gkEmoji->emoji(0xf89f, false, null, null, false);
		$this->assertEqual($str, '&#xe63e;');
		
	}
	
	function testConvertEmojiChractor(){
	
		$tools = Lib3gkTools::get_instance();
		
		$code = 0xf89f;
		$oekey = 0;
		$useHex = false;
		$binary = false;
		$str = $this->Lib3gkEmoji->__convertEmojiChractor($code, $oekey, $useHex, $binary);
		$this->assertEqual($str, '&#63647;');
		
		$binary = true;
		$str = $this->Lib3gkEmoji->__convertEmojiChractor($code, $oekey, $useHex, $binary);
		$this->assertEqual($str, $tools->int2str($code));
		
		$code = 0xe63e;
		$oekey = 1;
		$useHex = false;
		$binary = false;
		$str = $this->Lib3gkEmoji->__convertEmojiChractor($code, $oekey, $useHex, $binary);
		$this->assertEqual($str, '&#58942;');
		
		$useHex = true;
		$str = $this->Lib3gkEmoji->__convertEmojiChractor($code, $oekey, $useHex, $binary);
		$this->assertEqual($str, '&#xe63e;');
		
		$binary = true;
		$str = $this->Lib3gkEmoji->__convertEmojiChractor($code, $oekey, $useHex, $binary);
		$this->assertEqual($str, $tools->int2utf8($code));
		
	}
	
	function testAnalyzeEmoji(){
		
		$tools = Lib3gkTools::get_instance();
		
		$sjis = 0;			//UTF-8
		$utf8 = 1;			//UTF-8
		$docomo  = 1;		//docomo
		$kddi    = 2;		//KDDI
		
		//docomo / UTF-8
		//
		$str  = "絵文字テスト。飲食店です";
		$str .= $tools->int2utf8(0xe63e).$tools->int2utf8(0xe69c)."&#63647;aaa&#xe63e;bbb";
		
		$arr = $this->Lib3gkEmoji->__analyzeEmoji($str, array(
			'input_carrier'   => KTAI_CARRIER_DOCOMO, 
			'input_encoding'  => KTAI_ENCODING_UTF8, 
		));
		$this->assertEqual($arr[0][0], '絵文字テスト。飲食店です');
		$this->assertEqual($arr[0][1], 0xe63e);
		$this->assertEqual($arr[0][2], $utf8);
		$this->assertEqual($arr[0][3], $docomo);
		
		$this->assertEqual($arr[1][0], '');
		$this->assertEqual($arr[1][1], 0xe69c);
		$this->assertEqual($arr[1][2], $utf8);
		$this->assertEqual($arr[1][3], $docomo);
		
		$this->assertEqual($arr[2][0], '');
		$this->assertEqual($arr[2][1], 63647);
		$this->assertEqual($arr[2][2], $sjis);
		$this->assertEqual($arr[2][3], $docomo);
		
		$this->assertEqual($arr[3][0], 'aaa');
		$this->assertEqual($arr[3][1], 0xe63e);
		$this->assertEqual($arr[3][2], $utf8);
		$this->assertEqual($arr[3][3], $docomo);
		
		$this->assertEqual($arr[4][0], 'bbb');
		$this->assertEqual($arr[4][1], null);
		
		//AU / UTF-8
		//
		$str  = "絵文字テスト。飲食店です";
		$str .= $tools->int2utf8(0xe488).$tools->int2utf8(0xe5a8)."&#63072;aaa&#xef60;bbb";
		
		$arr = $this->Lib3gkEmoji->__analyzeEmoji($str, array(
			'input_carrier'   => KTAI_CARRIER_KDDI, 
			'input_encoding'  => KTAI_ENCODING_UTF8, 
		));
		$this->assertEqual($arr[0][0], '絵文字テスト。飲食店です');
		$this->assertEqual($arr[0][1], 0xe488);
		$this->assertEqual($arr[0][2], $utf8);
		$this->assertEqual($arr[0][3], $kddi);
		
		$this->assertEqual($arr[1][0], '');
		$this->assertEqual($arr[1][1], 0xe5a8);
		$this->assertEqual($arr[1][2], $utf8);
		$this->assertEqual($arr[1][3], $kddi);
		
		$this->assertEqual($arr[2][0], '');
		$this->assertEqual($arr[2][1], 0xf660);
		$this->assertEqual($arr[2][2], $sjis);
		$this->assertEqual($arr[2][3], $kddi);
		
		$this->assertEqual($arr[3][0], 'aaa');
		$this->assertEqual($arr[3][1], 0xef60);
		$this->assertEqual($arr[3][2], $utf8);
		$this->assertEqual($arr[3][3], $kddi);
		
		$this->assertEqual($arr[4][0], 'bbb');
		$this->assertEqual($arr[4][1], null);
		
		//SJIS
		//
		$str  = mb_convert_encoding("絵文字テスト。飲食店です", KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8);
		$str .= "\xf8\x9f\xf9\x40&#63647;aaa&#xe63e;bbb";
		
		$arr = $this->Lib3gkEmoji->__analyzeEmoji($str, array(
			'input_carrier'   => KTAI_CARRIER_DOCOMO, 
			'input_encoding'  => KTAI_ENCODING_SJISWIN, 
		));
		
		$this->assertEqual($arr[0][0], mb_convert_encoding('絵文字テスト。飲食店です', KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8));
		$this->assertEqual($arr[0][1], 0xf89f);
		$this->assertEqual($arr[0][2], $sjis);
		$this->assertEqual($arr[0][3], $docomo);
		
		$this->assertEqual($arr[1][0], '');
		$this->assertEqual($arr[1][1], 0xf940);
		$this->assertEqual($arr[1][2], $sjis);
		$this->assertEqual($arr[1][3], $docomo);
		
		$this->assertEqual($arr[2][0], '');
		$this->assertEqual($arr[2][1], 63647);
		$this->assertEqual($arr[2][2], $sjis);
		$this->assertEqual($arr[2][3], $docomo);
		
		$this->assertEqual($arr[3][0], 'aaa');
		$this->assertEqual($arr[3][1], 0xe63e);
		$this->assertEqual($arr[3][2], $utf8);
		$this->assertEqual($arr[3][3], $docomo);
		
		$this->assertEqual($arr[4][0], 'bbb');
		$this->assertEqual($arr[4][1], null);
		
	}

	function testSearchEmojiSet(){
		
		$carrier = KTAI_CARRIER_DOCOMO;
		$encode  = KTAI_ENCODING_SJISWIN;
		$code    = 0xf9fc;
		$check   = 'shock';
		$arr = $this->Lib3gkEmoji->__searchEmojiSet($code, $encode, $carrier);
		$this->assertEqual($arr[4], $check);
		
		$carrier = KTAI_CARRIER_DOCOMO;
		$encode  = KTAI_ENCODING_UTF8;
		$code    = 0xe70f;
		$check   = 'moneybag';
		$arr = $this->Lib3gkEmoji->__searchEmojiSet($code, $encode, $carrier);
		$this->assertEqual($arr[4], $check);
		
		$carrier = KTAI_CARRIER_KDDI;
		$encode  = KTAI_ENCODING_SJISWIN;
		$code    = 0xf797;
		$check   = 'watch';
		$arr = $this->Lib3gkEmoji->__searchEmojiSet($code, $encode, $carrier);
		$this->assertEqual($arr[4], $check);
		
		$carrier = KTAI_CARRIER_KDDI;
		$encode  = KTAI_ENCODING_UTF8;
		$code    = 0xe495;
		$check   = 'libra';
		$arr = $this->Lib3gkEmoji->__searchEmojiSet($code, $encode, $carrier);
		$this->assertEqual($arr[4], $check);
		
		$code    = 0xef6d;
		$check   = 'libra';
		$arr = $this->Lib3gkEmoji->__searchEmojiSet($code, $encode, $carrier);
		$this->assertEqual($arr[4], $check);
		
		//注意！：ソフトバンクは現在非対応
		//
		
		
		//注意！：PCはdocomo扱い
		//
		$carrier = KTAI_CARRIER_UNKNOWN;
		$encode  = KTAI_ENCODING_SJISWIN;
		$code    = 0xf8b9;
		$check   = 'basketball';
		$arr = $this->Lib3gkEmoji->__searchEmojiSet($code, $encode, $carrier);
		$this->assertEqual($arr[4], $check);
		
		$carrier = KTAI_CARRIER_UNKNOWN;
		$encode  = KTAI_ENCODING_UTF8;
		$code    = 0xe71d;
		$check   = 'bicycle';
		$arr = $this->Lib3gkEmoji->__searchEmojiSet($code, $encode, $carrier);
		$this->assertEqual($arr[4], $check);
		
	}
	
	function testConvertEmoji(){
		
		$lib3gkTools   = Lib3gkTools::get_instance();
		$lib3gkCarrier = Lib3gkCarrier::get_instance();
		
		$text1 = '絵文字テスト';
		$text2 = '飲食店です';
		
		$test_text = array(
			KTAI_ENCODING_SJISWIN => array(
				mb_convert_encoding($text1, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8), 
				mb_convert_encoding($text2, KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8), 
			), 
			KTAI_ENCODING_UTF8 => array(
				$text1, 
				$text2, 
			), 
		);
		
		$emoji = array(
			KTAI_ENCODING_UTF8 => array(
				KTAI_CARRIER_UNKNOWN => array(
					array(
						'[晴]', 
						'<img src="./img/emoticons/sun.gif" border="0" width="16" height="16">', 
					), 
					array(
						'[晴]', 
						'<img src="./img/emoticons/sun.gif" border="0" width="16" height="16">', 
					), 
				), 
				KTAI_CARRIER_DOCOMO => array(
					array(
						'&#xe63e;', 
						'&#xe63e;', 
					), 
					array(
						$lib3gkTools->int2utf8(0xe63e), 
						$lib3gkTools->int2utf8(0xe63e), 
					), 
				), 
				KTAI_CARRIER_KDDI => array(
					array(
						'&#xe488;', 
						'&#xe488;', 
					), 
					array(
						$lib3gkTools->int2utf8(0xef60), 
						$lib3gkTools->int2utf8(0xef60), 
					), 
				), 
				KTAI_CARRIER_SOFTBANK => array(
					array(
						'&#xe04a;', 
						'&#xe04a;', 
					), 
					array(
						$lib3gkTools->int2utf8(0xe04a), 
						$lib3gkTools->int2utf8(0xe04a), 
					), 
				), 
			), 
			KTAI_ENCODING_SJISWIN => array(
				KTAI_CARRIER_UNKNOWN => array(
					array(
						mb_convert_encoding('[晴]', KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8), 
						'<img src="./img/emoticons/sun.gif" border="0" width="16" height="16">', 
					), 
					array(
						mb_convert_encoding('[晴]', KTAI_ENCODING_SJISWIN, KTAI_ENCODING_UTF8), 
						'<img src="./img/emoticons/sun.gif" border="0" width="16" height="16">', 
					), 
				), 
				KTAI_CARRIER_DOCOMO => array(
					array(
						'&#63647;', 
						'&#63647;', 
					), 
					array(
						$lib3gkTools->int2str(0xf89f), 
						$lib3gkTools->int2str(0xf89f), 
					), 
				), 
				KTAI_CARRIER_KDDI => array(
					array(
						'&#63072;', 
						'&#63072;', 
					), 
					array(
						$lib3gkTools->int2str(0xf660), 
						$lib3gkTools->int2str(0xf660), 
					), 
				), 
				KTAI_CARRIER_SOFTBANK => array(
					array(
						'&#57418;', 
						'&#57418;', 
					), 
					array(
						$lib3gkTools->int2str(0xf98b), 
						$lib3gkTools->int2str(0xf98b), 
					), 
				), 
			), 
		);
		
		foreach($test_text  as $input_encoding => $txt){
			foreach($emoji as $output_encoding => $fvalue1){
				foreach($fvalue1 as $carrier => $fvalue2){
					foreach($fvalue2 as $binary => $fvalue3){
						foreach($fvalue3 as $use_img_emoji => $e){
							
							$lib3gkCarrier->_carrier = $carrier;
							$this->Lib3gkEmoji->_params['input_encoding']  = $input_encoding;
							$this->Lib3gkEmoji->_params['output_encoding'] = $output_encoding;
							$this->Lib3gkEmoji->_params['use_img_emoji']   = $use_img_emoji;
							
							$str_result  = $txt[0].$emoji[$input_encoding][KTAI_CARRIER_DOCOMO][0][0].'/';
							$str_result .= $txt[1].$emoji[$input_encoding][KTAI_CARRIER_DOCOMO][1][0];
							
							$str_check  = $test_text[$output_encoding][0];
							$str_check .= $e.'/';
							$str_check .= $test_text[$output_encoding][1];
							$str_check .= $e;
							
							$this->Lib3gkEmoji->convert_emoji($str_result, null, null, null, $binary);
							$this->assertEqual($str_result, $str_check);
						}
					}
				}
			}
		}
	}
	
	function testCaching(){
		
		$tools = Lib3gkTools::get_instance();
		$lib3gkCarrier = Lib3gkCarrier::get_instance();
		
		$lib3gkCarrier->_carrier = KTAI_CARRIER_UNKNOWN;
		$this->Lib3gkEmoji->_params['input_encoding']  = KTAI_ENCODING_UTF8;
		$this->Lib3gkEmoji->_params['output_encoding'] = KTAI_ENCODING_UTF8;
		
		$str  = "絵文字テスト。飲食店です";
		$str .= $tools->int2utf8(0xe63e).$tools->int2utf8(0xe69c)."&#63647;aaa&#xe63e;bbb";
		
		$str_result = $str;
		$this->Lib3gkEmoji->convert_emoji($str_result);
		$this->assertFalse(isset($this->Lib3gkEmoji->__cached[0][0][63647]));
		$this->assertFalse(isset($this->Lib3gkEmoji->__cached[0][1][0xe63e]));
		$this->assertFalse(isset($this->Lib3gkEmoji->__cached[0][1][0xe69c]));
		
		$this->Lib3gkEmoji->_params['use_emoji_cache'] = true;
		$str_result = $str;
		$this->Lib3gkEmoji->convert_emoji($str_result);
		$this->assertTrue(isset($this->Lib3gkEmoji->__cached[0][0][63647]));
		$this->assertTrue(isset($this->Lib3gkEmoji->__cached[0][1][0xe63e]));
		$this->assertTrue(isset($this->Lib3gkEmoji->__cached[0][1][0xe69c]));
		
		$str_check = $str;
		$this->Lib3gkEmoji->convert_emoji($str_check);
		$this->assertEqual($str_result, $str_check);
		
	}
}
