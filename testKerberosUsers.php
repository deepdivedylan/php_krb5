<?php

require_once("/usr/lib/php5/simpletest/autorun.php");
require_once("KerberosUsers.php");
class TestUserModel extends UnitTestCase
{
	function testCreateKerberosUserValidNullNonce()
	{
		$newEmail		= "JamesJamesonJr@email.com";
		$newNonce		= null;		// null is an excepted value for nonce
		$newUserId	= 372021;
		$user = new KerberosUsers($newEmail, $newNonce, $newUserId);
		$this->assertIsA($user,"KerberosUsers");
		$this->assertIsA($user->getEmail(), "string");
		$this->assertNull($user->getNonce());
		$this->assertIsA($user->getUserId(), "int");
	}
	
	function testCreateKerberosUserValidStringNonce()
	{		
		$newEmail		= "JamesJamesonJr@email.com";
		$newNonce		= "look at me, I'm a nonce.";		// null is an excepted value for nonce
		$newUserId	= 372021;
		$user = new KerberosUsers($newEmail, $newNonce, $newUserId);
		$this->assertIsA($user,"KerberosUsers");
		$this->assertIsA($user->getEmail(), "string");
		$this->assertTrue($user->getNonce(),"string");
		$this->assertIsA($user->getUserId(), "int");
	}

}
?>