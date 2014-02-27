<?php
// create a principal 

// primary php binding to kerb
// $conn = new KADM5("HTTP/students.deepdivecoders.com@STUDENTS.DEEPDIVECODERS.COM", "/etc/apache2/krb5.keytab", true);

// this object is used by the kerberos object to actually create the princ
// $princ = new KADM5Principal('testlala');

// $princ->setExpiryTime(2342342);
/*
$princ = $conn->getPrincipal('testlala');

echo "<pre>";

var_dump($princ);
var_dump($princ->getPropertyArray());

echo "</pre>";
echo "<br/><br/><br/>";


 

// change principal's password
// primary object "nameOfPrincipal", "location of key", usingAKey (t/f)
$conn = new KADM5("HTTP/students.deepdivecoders.com@STUDENTS.DEEPDIVECODERS.COM", "/etc/apache2/krb5.keytab", true);

// fetch principal in question

$princ = $conn->getPrincipal('testlala');

//change principal's password

$princ->changePassword('footest');

echo "CHANGED PASSWORD";

echo "<pre>";

var_dump($princ);
var_dump($princ->getPropertyArray());

echo "</pre>";


// acquire a ticket for the principal

$ticket = new KRB5CCache();

$ticket->initPassword('testlala', 'footest');

echo "<pre>";

var_dump($ticket->getEntries());

echo "</pre>";

*/


// ok now with objects.  This emulates the initial creation of a principal.
	require_once("User.php");
	$newEmail		= "JamesJamesonJr@email.com";
	$newNonce		= null;				// null is an excepted value for nonce
	$newUserId	= 372021;
	$user = new KerberosUsers($newEmail, $newNonce, $newUserId);
	// kerberos object
	$conn = new KADM5("HTTP/students.deepdivecoders.com@STUDENTS.DEEPDIVECODERS.COM", "/etc/apache2/krb5.keytab", true);
	
	$princName = "webUser" . $user->getUserId() . "/capstonesite@STUDENTS.DEEPDIVECODERS.COM";
	$princ = new KADM5Principal($princName);

	// create the princ
	
	$createdPrinc = $conn->createPrincipal($princ, 'testpass');
	echo "<pre>";
	var_dump($createdPrinc);
	echo "</pre>";
		
?>