<?php  

class Flash 
{
	// Returns an associative array, where key - bootstrap/css style "danger", value - text of flash message
	// @param  string $message
	// @return  array
	public function danger($message){
	    $_SESSION['flash'] = ['danger' => $message];
	    return $_SESSION['flash'];
	}

	// Returns an associative array, where key - bootstrap/css style "warning", value - text of flash message
	// @param  string $message
	// @return  array
	public function warning($message){
	    $_SESSION['flash'] = ['warning' => $message];
	    return $_SESSION['flash'];
	}

	// Returns an associative array, where key - bootstrap/css style "success", value - text of flash message
	// @param  string $message
	// @return  array
	public function success($message){
	    $_SESSION['flash'] = ['success' => $message];
	    return $_SESSION['flash'];
	}

	// Diplays flash message in VIEW
	public static function display(){
	    if(isset($_SESSION['flash']))
	    {$message_name = array_keys($_SESSION['flash'])[0]; 
	    echo "<div class=\"alert alert-{$message_name} text-dark\" role=\"alert\">
	        {$_SESSION['flash'][$message_name]}                                   
	        </div>";
	    unset($_SESSION['flash']);     
	    };
	}
}
?>