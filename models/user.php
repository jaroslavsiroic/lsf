<?php 
	class User {
		public $id;
		public $username;
		public $name;
		public $surname;

		public function __construct($id, $username, $name, $surname) {
			$this->id = $id;
			$this->username = $username;
			$this->name = $name;
			$this->surname = $surname;
		}

		public function isLoggedIn() {
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
				return true;
			} else return false;
		}

		public function login($username, $password) {
			$username = validate($username);
			$password = validate($password);	

			$db = Db::getInstance();
			// we make sure $id is an integer
			$req = $db->prepare('SELECT * FROM user WHERE username = :username and password = :password');
			$req->execute(array('username' => $username, 'password' => $password));

			$result = $req->fetch();

			if ($password != "" && $username != "" && $password == $result['password'] && $username == $result['username']){
				$_SESSION['loggedin'] = true;
				$this->id = $result['id'];
				$this->username = $result['username'];
				$this->name = $result['name'];
				$this->surname = $result['surname'];
				return true;
			} else return false;
		}

		public function logout() {
			session_destroy();
		}

		public function register($username, $name, $surname, $password) {
			//TODO register to data base and return true or false
			$username = validate($username);
			$surname = validate($surname);
			$name = validate($name);
			$password = validate($password);
			$db = Db::getInstance();
			try {
				$result = $db->prepare('INSERT INTO user(username, name, surname, password) VALUES (:nick , :name , :surname , :pass)');
				$result->execute(array('nick' => $username, 'name' => $name, 'surname' => $surname, 'pass' => $password));
				$page = new PagesController();
				$page->ok();
			} catch(PDOException $e) {
			    echo '<p class="error">Username is already in use!</p>';
			}
		}
		public function savePost($post) {
			
		}
	}
?>