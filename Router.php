<?php  

class Router 
{
	protected $route;

	public function __construct(){
		$this->route = $_SERVER['REQUEST_URI'];
	}

	// Redirects from $route (index.php) to the php file (value in $routes_array) associated with the $route (key in $routes_array) if exists. Otherwise shows 404
	// @param  array $routes_array
	// @param  str $path
	public function check($routes_array, $path){
		if(array_key_exists($this->route, $routes_array)){
			include $path.$routes_array[$this->route];exit;
		} else {
			echo '404';die;
		};
	}	
}

?>