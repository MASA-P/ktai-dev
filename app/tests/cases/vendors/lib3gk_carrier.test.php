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

class TestLib3gkCarrier extends CakeTestCase {

	var $Lib3gkCarrier = null;
	
	function start(){
		$this->Lib3gkCarrier = new Lib3gkCarrier();
		$this->Lib3gkCarrier->initialize();
	}
	
	function stop(){
		$this->Lib3gkCarrier->shutdown();
	}
	
	function testAnalyzeUserAgent(){
		$arr = $this->Lib3gkCarrier->analyze_user_agent();
		$this->assertTrue(is_array($arr));
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_UNKNOWN);
		
		$user_agent = 'DoCoMo/1.0/SO506iS/c20/TB/W20H10';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_DOCOMO);
		
		$user_agent = 'DoCoMo/2.0 P906i(c100;TB;W24H15)';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_DOCOMO);
		$this->assertEqual($arr['machine_name'], 'P906i');
		
		//#1 一部端末の機種判別が出来ない
		$user_agent = 'DoCoMo/2.0 SO902iWP+(c100;TB;W24H12)';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_DOCOMO);
		$this->assertEqual($arr['machine_name'], 'SO902iWP+');
		
		$user_agent = 'HTTP_USER_AGENT=KDDI-SA31 UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_KDDI);
		
		$user_agent = 'SoftBank/1.0/840SH/SHJ001/0123456789 Browser/NetFront/3.5 Profile/MIDP-2.0 Configuration/CLDC-1.1';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_SOFTBANK);
		
		$user_agent = 'emobile/1.0.0 (H11T; like Gecko; Wireless) NetFront/3.4';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_EMOBILE);
		
		$user_agent = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 2_0 like Mac OS X; ja-jp) AppleWebKit/525.18.1 (KHTML, like Gecko) Version/3.1.1 Mobile/5A345 Safari/525.20';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_IPHONE);
		
		$user_agent = 'Mozilla/3.0(WILLCOM;JRC/WX310J/2;1/1/C128) NetFront/3.3';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_PHS);
		
		$user_agent = 'Mozilla/5.0 (Linux; U; Android 1.6; ja-jp; SonyEricssonSO-01B Build/R1EA018) AppleWebKit/528.5+ (KHTML, like Gecko) Version/3.1.2 Mobile Safari/525.20.1';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_ANDROID);
		
		$user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KDDI-TS01; Windows Phone 6.5.3.5)';
		$arr = $this->Lib3gkCarrier->analyze_user_agent($user_agent);
		$this->assertEqual($arr['carrier'], KTAI_CARRIER_KDDI);
		$this->assertEqual($arr['machine_name'], 'default');
		
	}
	
	function testGetCarrier(){
		$test_value = $this->Lib3gkCarrier->get_carrier();
		$this->assertEqual($test_value, KTAI_CARRIER_UNKNOWN);
		$this->assertTrue($this->Lib3gkCarrier->_carrier == KTAI_CARRIER_UNKNOWN && $this->Lib3gkCarrier->_carrier_name == 'others' && $this->Lib3gkCarrier->_machine_name == 'default');
		
		$user_agent = 'DoCoMo/2.0 P906i(c100;TB;W24H15)';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_DOCOMO);
		
		$user_agent = 'HTTP_USER_AGENT=KDDI-SA31 UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_KDDI);
		
		$user_agent = 'SoftBank/1.0/840SH/SHJ001/0123456789 Browser/NetFront/3.5 Profile/MIDP-2.0 Configuration/CLDC-1.1';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_SOFTBANK);
		
		$user_agent = 'emobile/1.0.0 (H11T; like Gecko; Wireless) NetFront/3.4';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_EMOBILE);
		
		$user_agent = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 2_0 like Mac OS X; ja-jp) AppleWebKit/525.18.1 (KHTML, like Gecko) Version/3.1.1 Mobile/5A345 Safari/525.20';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_IPHONE);
		
		$user_agent = 'Mozilla/3.0(WILLCOM;JRC/WX310J/2;1/1/C128) NetFront/3.3';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_PHS);
		
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_DOCOMO;
		$test_value = $this->Lib3gkCarrier->get_carrier();
		$this->assertEqual($test_value, KTAI_CARRIER_DOCOMO);
		
		$test_value = $this->Lib3gkCarrier->get_carrier(null, true);
		$this->assertEqual($test_value, KTAI_CARRIER_UNKNOWN);
		
		$user_agent = 'Mozilla/5.0 (Linux; U; Android 1.6; ja-jp; SonyEricssonSO-01B Build/R1EA018) AppleWebKit/528.5+ (KHTML, like Gecko) Version/3.1.2 Mobile Safari/525.20.1';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_ANDROID);
		
		$user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KDDI-TS01; Windows Phone 6.5.3.5)';
		$test_value = $this->Lib3gkCarrier->get_carrier($user_agent);
		$this->assertEqual($test_value, KTAI_CARRIER_KDDI);
		
	}
	
	function testIsImode(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_DOCOMO;
		$test_value = $this->Lib3gkCarrier->is_imode();
		$this->assertTrue($test_value);
	}
	
	function testIsSoftbank(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_SOFTBANK;
		$test_value = $this->Lib3gkCarrier->is_softbank();
		$this->assertTrue($test_value);
		
		$this->Lib3gkCarrier->_params['iphone_user_agent_belongs_to_softbank'] = true;
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_IPHONE;
		$test_value = $this->Lib3gkCarrier->is_softbank();
	}
	
	function testIsEzweb(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_KDDI;
		$test_value = $this->Lib3gkCarrier->is_ezweb();
		$this->assertTrue($test_value);
	}
	
	function testIsEmobile(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_EMOBILE;
		$test_value = $this->Lib3gkCarrier->is_emobile();
		$this->assertTrue($test_value);
	}
	
	function testIsIphone(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_IPHONE;
		$test_value = $this->Lib3gkCarrier->is_iphone();
		$this->assertTrue($test_value);
	}
	
	function testIsAndroid(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_ANDROID;
		$test_value = $this->Lib3gkCarrier->is_android();
		$this->assertTrue($test_value);
	}
	
	function testIsKtai(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_DOCOMO;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertTrue($test_value);
		
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_SOFTBANK;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertTrue($test_value);
		
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_KDDI;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertTrue($test_value);
		
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_EMOBILE;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertTrue($test_value);
		
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_UNKNOWN;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertFalse($test_value);
		
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_IPHONE;
		$this->Lib3gkCarrier->_params['iphone_user_agent_belongs_to_softbank'] = false;
		$this->Lib3gkCarrier->_params['iphone_user_agent_belongs_to_ktai'] = false;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertFalse($test_value);
		$this->Lib3gkCarrier->_params['iphone_user_agent_belongs_to_ktai'] = true;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertTrue($test_value);
		
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_ANDROID;
		$this->Lib3gkCarrier->_params['android_user_agent_belongs_to_ktai'] = false;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertFalse($test_value);
		$this->Lib3gkCarrier->_params['android_user_agent_belongs_to_ktai'] = true;
		$test_value = $this->Lib3gkCarrier->is_ktai();
		$this->assertTrue($test_value);
	}
	
	function testIsPhs(){
		$this->Lib3gkCarrier->_carrier = KTAI_CARRIER_PHS;
		$test_value = $this->Lib3gkCarrier->is_phs();
		$this->assertTrue($test_value);
	}
	
	function testIsImodeEmail(){
		$mail = 'test@docomo.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_imode_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->is_imode_email($mail);
		$this->assertFalse($test_value);
	}
	
	function testIsSoftbankEmail(){
		$mail = 'test@softbank.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_softbank_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@i.softbank.jp';
		$this->Lib3gkCarrier->_params['iphone_email_belongs_to_softbank_email'] = false;
		$test_value = $this->Lib3gkCarrier->is_softbank_email($mail);
		$this->assertFalse($test_value);
		$this->Lib3gkCarrier->_params['iphone_email_belongs_to_softbank_email'] = true;
		$test_value = $this->Lib3gkCarrier->is_softbank_email($mail);
		$this->assertTrue($test_value);
		
		
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->is_softbank_email($mail);
		$this->assertFalse($test_value);
	}
	
	function testIsIphoneEmail(){
		$mail = 'test@i.softbank.jp';
		$test_value = $this->Lib3gkCarrier->is_iphone_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->is_iphone_email($mail);
		$this->assertFalse($test_value);
	}
	
	function testIsEzwebEmail(){
		$mail = 'test@ezweb.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_ezweb_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->is_ezweb_email($mail);
		$this->assertFalse($test_value);
	}
	
	function testIsEmobileEmail(){
		$mail = 'test@emnet.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_emobile_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->is_emobile_email($mail);
		$this->assertFalse($test_value);
	}
	
	function testIsKtaiEmail(){
		$mail = 'test@docomo.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@ezweb.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@softbank.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@emnet.ne.jp';
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@i.softbank.jp';
		$this->Lib3gkCarrier->_params['iphone_email_belongs_to_softbank_email'] = false;
		$this->Lib3gkCarrier->_params['iphone_email_belongs_to_ktai_email'] = false;
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertFalse($test_value);
		$this->Lib3gkCarrier->_params['iphone_email_belongs_to_ktai_email'] = true;
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertTrue($test_value);
		
		$this->Lib3gkCarrier->_params['iphone_email_belongs_to_softbank_email'] = true;
		$this->Lib3gkCarrier->_params['iphone_email_belongs_to_ktai_email'] = false;
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->is_ktai_email($mail);
		$this->assertFalse($test_value);
	}
	
	function testIsPhsEmail(){
		$mail = 'test@willcom.com';
		$test_value = $this->Lib3gkCarrier->is_phs_email($mail);
		$this->assertTrue($test_value);
		
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->is_phs_email($mail);
		$this->assertFalse($test_value);
	}
	
	function testGetEmailCarrier(){
		$mail = 'test@example.com';
		$test_value = $this->Lib3gkCarrier->get_email_carrier($mail);
		$this->assertEqual($test_value, KTAI_CARRIER_UNKNOWN);
		
		$mail = 'test@docomo.ne.jp';
		$test_value = $this->Lib3gkCarrier->get_email_carrier($mail);
		$this->assertEqual($test_value, KTAI_CARRIER_DOCOMO);
		
		$mail = 'test@ezweb.ne.jp';
		$test_value = $this->Lib3gkCarrier->get_email_carrier($mail);
		$this->assertEqual($test_value, KTAI_CARRIER_KDDI);
		
		$mail = 'test@softbank.ne.jp';
		$test_value = $this->Lib3gkCarrier->get_email_carrier($mail);
		$this->assertEqual($test_value, KTAI_CARRIER_SOFTBANK);
		
		$mail = 'test@emnet.ne.jp';
		$test_value = $this->Lib3gkCarrier->get_email_carrier($mail);
		$this->assertEqual($test_value, KTAI_CARRIER_EMOBILE);
		
		$mail = 'test@i.softbank.jp';
		$test_value = $this->Lib3gkCarrier->get_email_carrier($mail);
		$this->assertEqual($test_value, KTAI_CARRIER_IPHONE);
		
		$mail = 'test@willcom.com';
		$test_value = $this->Lib3gkCarrier->get_email_carrier($mail);
		$this->assertEqual($test_value, KTAI_CARRIER_PHS);
	}
	
}
