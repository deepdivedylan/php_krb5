<?php

class User

{
	// state variables
	protected $email;
	protected $nonce;
	protected $userId;
	
	// constructor
	public function __construct($newEmail, $newNonce, $newUserId)
	{
		try
		{
			$this->setEmail($newEmail);
			$this->setNonce($newNonce);
			$this->setUserId($newUserId);
		}
		
		catch(Exception $e)

		{
			throw(new Exception("Users object construct failure.", 0, $e));
		}
	}
	// accessors
	/**/
	/* accessor for email
	 * input none
	 * output string email
	 * throws none					*/
	public function getEmail()
	{
		return($this->email);
	}
	
	/* accessor for nonce
	 * input none
	 * output string nonce, or null if nonce is empty.  Registered users will not have a nonce.
	 * throws none					*/
	public function getNonce()
	{
		return ($this->nonce);
	}
	
	/* accessor for userId 
	 * input none
	 * output int userId
	 * throws none */
	 
	public function getUserId()
	{
		return($this->userId);
	}
	// mutators
	
	/*mutator for email
	 * input string email
	 * output none
	 * throws: empty, nonstring, */
	
	public function setEmail($newEmail)
	{
		if(!is_string($newEmail) || empty($newEmail))
		{
			throw new Exception("Invalid username or password.");
		}
		else
		{
			$this->email = $newEmail;
		}
	}
	/* mutator for nonce
	 * input: string nonce hex
	 * output: none
	 * throws: nonhex										*/
	 
	public function setNonce($newNonce)
	{
		// FIXME with actual logic that reflects the qualities of the nonce which are TBA
		$this->nonce = $newNonce;
	}
	
	/* mutator for userId 
	 * intput: int userId
	 * output: none
	 * throws: nonint, <= 0									*/
	 
	public function setUserId($newUserId)
	{
		if(!is_int($newUserId) || $newUserId <= 0)
		{
			throw new Exception ("Invalid username or password.");
		}
		else
		{
			$this->userId = $newUserId;
		}	
	}
	// nonce handling
	
	/* this method must recieve an input from the confirmation process which will create a 
	 * users object and fire a verify-nonce method.  The nonce is sent through $_POST data and matched
	 * in this method, if it matches the nonce which is obtained from the data-row the user's data-row
	 * is updated with the nonce being null.
	 * intput: string nonce from registration link
	 * output: none
	 * throws: $registrationNonce not a string, hex, and of the appropriate length (regex), failed to match */
	/*public function matchNonce($registrationNonce)
	{
		$p = "/^[0-9a-fA-F]{64}$/";
		if(preg_match($registrationNonce, $p) !== 1)
		{
			throw new Exception("Invalid registration type.");
		}
		elseif($this->getNonce() !== $registrationNonce)
		{
			throw new Exception("Invalid registration details.");
		}
		else
		{
			// update user row with a null nonce
		}
	}
	*/
	// string



	
}

?>