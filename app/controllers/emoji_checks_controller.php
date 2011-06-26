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
class EmojiChecksController extends KtaiAppController {

	var $name = 'EmojiChecks';
	var $uses = array();
	var $components = array('Ktai');
	var $helpers = array('Ktai');
	var $layout = 'ktai_default';
	
	//Sample ktai params
	//
	var $ktai = array(
		'use_img_emoji' => true, 
		'input_encoding' => 'UTF8', 
		'output_encoding' => 'UTF8', 
		'use_xml' => false, 
	);
	
	//Sample index action
	//
	function index(){
		App::import('Vendor', 'ecw/lib3gk_emoji');
		$instance = Lib3gkEmoji::get_instance();
		
		$emoji = $instance->__emoji_table;
		$encoding = $binary = $convert = 0;
		if(isset($this->params['named']['encoding'])){
			$encoding = intval($this->params['named']['encoding']);
		}
		if(isset($this->params['named']['binary'])){
			$binary = intval($this->params['named']['binary']);
		}
		if(isset($this->params['named']['convert'])){
			$convert = intval($this->params['named']['convert']);
		}
		$this->set(compact('emoji', 'encoding', 'binary', 'convert'));
		
		if($encoding == 0){
			Configure::write('App.encoding', 'Shift_JIS');
			$this->layout = 'ktai_default_sjis';
			$this->ktai['output_encoding'] = KTAI_ENCODING_SJISWIN;
			header('Content-Type: text/html; charset=Shift_JIS');
		}
		if($binary){
			$this->ktai['use_binary_emoji'] = true;
		}else{
			$this->ktai['use_binary_emoji'] = false;
		}
		if($convert){
			$this->ktai['output_auto_convert_emoji'] = true;
			$this->ktai['output_auto_encoding'] = true;
			if($binary){
				$this->render('index_conv_bin');
			}else{
				$this->render('index_conv_char');
			}
		}
	}
	
}
