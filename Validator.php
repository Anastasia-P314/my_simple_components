<?php  

class Validator 
{
	// Returns true if email format is valid (contains @ and . in the right places)
	// @param  string $email 
    // @return bool 
	public function check_email($email)
	{
		if(preg_match("/.+@[a-zA-Z]+\.[a-zA-Z]+/", $email)==0)
		{
			return false;
		} else {
			return true;
		};
	}

	// Returns true if password is confirmed. $min_length is optional parameter 
	// @param  string $password1
	// @param  string $password2
	// @param  int $min_length
    // @return bool 
	public function check_password($password1, $password2, $min_length = 0)
	{
		if($password1!=$password2 || strlen($password1) < $min_length)
		{
			return false;
		} else {
			return true;
		};
	}
}

?>