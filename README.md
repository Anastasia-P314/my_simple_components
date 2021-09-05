# The simplest components

1. Router
2. QueryBuilder 
3. Validator
4. Flash

______________________________________________________________________________________________
### 1. Router 
Checks whether 'REQUEST_URI' is in array as key. Redirects browser from default index.php to specified php files. Ortherwise displays 404 error.
##### Example
```
$router = new Router();
$router->check(
	['/' => 'homepage.php',
	'/about' => 'about.php'], 
	__DIR__.'/../');
````


### 2. QueryBuilder
Simplifies interaction with any table in database. Covers basic methods: create, read, update, delete 
##### Example
```
$db = new QueryBuilder();
$posts = $db->getAll('posts');

````


### 3. Validator
Validates email and password
##### Example
```
$validator = new Validator();

// Returns true if email format is valid (contains @ and . in the right places)
$validator->check_email($email);

// Returns true if password is confirmed. Last parameter int $min_length is optional
$validator->check_password($password1, $password2, 3);

````


### 4. Flash 
Sets and displays flash messages
##### Example
```
//In Controller
$flash = new Flash();

if(!empty($user)){
    $flash->danger("<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.");
    redirect_to("page_register.php");
    exit;
} else {
	$flash->success("Регистрация успешна");
	create_new_user("page_register.php");
	redirect_to("page_login.php");
};

//In VIEW
Flash::display();
````
