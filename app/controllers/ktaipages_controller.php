<?php
/**
 * Ktai library, supports Japanese mobile phone sites coding.
 * It provides many functions such as a carrier check to use Referer or E-mail, 
 * conversion of an Emoji, and more.
 *
 * PHP versions 4 and 5
 *
 * Ktai Library for CakePHP
 * Copyright 2009-2010, ECWorks.
 
 * Licensed under The GNU General Public Licence
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright		Copyright 2009-2010, ECWorks.
 * @link			http://www.ecworks.jp/ ECWorks.
 * @version			0.4.0
 * @lastmodified	$Date: 2010-11-30 03:00:00 +0900 (Tue, 30 Nov 2010) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

App::import('Controller', 'Ktai.KtaiApp');
class KtaipagesController extends KtaiAppController {

	var $name = 'Ktaipages';
	var $uses = array();
	var $components = array('Ktai.Ktai');
	var $helpers = array('Ktai.Ktai');
	var $layout = 'ktai_default';
	
	//Sample ktai params
	//
	var $ktai = array(
		'use_img_emoji' => true, 
		'input_encoding' => 'UTF8', 
		'output_encoding' => 'UTF8', 
		'use_xml' => true, 
	);
	
	//Sample index action
	//
	function index(){
	}
	
}
