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
 * @version			0.4.2
 * @lastmodified	$Date: 2011-06-27 09:00:00 +0900 (Mon, 27 Jun 2011) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

App::import('Controller', 'KtaiApp');
class KtaiTestsController extends KtaiAppController {

	var $name = 'KtaiTests';
	var $uses = array();
	var $components = array('Ktai');
	var $helpers = array('Ktai');
	var $layout = 'ktai_test';
	
	//Sample ktai params
	//
	var $ktai = array(
		'use_img_emoji' => true, 
		'input_encoding' => 'UTF8', 
		'output_encoding' => 'UTF8', 
	);
	
	//Redirect test
	//
	function index(){
	}
	
	//AutoConvert test
	//
	function autoconv(){
		$this->ktai = array_merge($this->ktai, array(
			'output_encoding' => KTAI_ENCODING_SJISWIN, 
		));
	}
	
	//requestActionテスト
	//
	function requested(){
		
		//自動コンバート設定(全部入り)
		//
		$this->ktai = array_merge($this->ktai, array(
			'output_encoding' => KTAI_ENCODING_SJISWIN, 
			'use_binary_emoji' => true, 
			'output_auto_convert_emoji' => true, 
			'output_auto_encoding' => true, 
			'output_convert_kana' => 'knrs', 
		));
		
		//autoconvをレンダリング(layoutなし)
		//
		$this->render('autoconv', false);
	}
}
