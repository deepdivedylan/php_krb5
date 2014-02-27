<?php

require_once("/usr/lib/php5/simpletest/autorun.php");
require_once("User.php");
class TestUserModel extends UnitTestCase
{
	function testCreateUserValidNullNonce()
	{
		$newEmail		= "JamesJamesonJr@email.com";
		$newNonce		= null;		// null is an excepted value for nonce
		$newUserId	= 372021;
		$user = new Users($newEmail, $newNonce, $newUserId);
		$p = "/^[0-9a-fA-F]{64}$/";
		$this->assertMatch($user->getNonce(), $p);
		$this->assertIsA($user,"User");
		$this->assertIsA($user->getEmail(), "string");
		$this->assertNull($user->getNonce());
		$this->assertIsA($user->getUserId(), "int");
	}
	
	function testCreateUserValidStringNonce()
	{		
		$newEmail		= "JamesJamesonJr@email.com";
		$newNonce		= "3456789012345678901234567890abcd3456789012345678901234567890abcd";		// null is an excepted value for nonce
		$newUserId	= 372021;
		$user = new User($newEmail, $newNonce, $newUserId);
		$p = "/^[0-9a-fA-F]{64}$/";
		$this->assertMatch($user->getNonce(), $p);
		$this->assertIsA($user,"User");
		$this->assertIsA($user->getEmail(), "string");
		$this->assertTrue($user->getNonce(),"string");
		$this->assertIsA($user->getUserId(), "int");
	}
	
	function testCreateUserInvalidStringNonce()
	{		
		$newEmail		= "JamesJamesonJr@email.com";
		$newNonce		= "look at me, I'm a nonce.";		// null is an excepted value for nonce
		$newUserId	= 372021;
		$user = new User($newEmail, $newNonce, $newUserId);
		$p = "/^[0-9a-fA-F]{64}$/";
		$this->assertMatch($user->getNonce(), $p);
		$this->assertIsA($user,"User");
		$this->assertIsA($user->getEmail(), "string");
		$this->assertTrue($user->getNonce(),"string");
		$this->assertIsA($user->getUserId(), "int");
	}

}
?>