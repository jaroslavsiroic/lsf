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
		public function change($change, $changeValue, $pass) {
			$db = Db::getInstance();
			// we make sure $id is an integer
			$req = $db->prepare('SELECT * FROM user WHERE username = :username and password = :pass');
			$req->execute(array('username' => $this->username, 'pass' => $pass));

			$result = $req->fetch();

			if ($result['username'] != "" && $result['username'] == $this->username) {
				$req = $db->prepare("UPDATE user SET {$change}=:changeV WHERE id =:id");

				$req->execute(array('changeV' => $changeValue, 'id' => $this->id));
				if ($change == 'name' || $change == 'surname') $this->{$change} = $changeValue;
				return true;
			} else return false;
		}

		public static function find($id) {
			$db = Db::getInstance();
			// we make sure $id is an integer
			$id = intval($id);
			$req = $db->prepare('SELECT * FROM user WHERE id = :id');
			// the query was prepared, now we replace :id with our actual $id value
			$req->execute(array('id' => $id));
			$post = $req->fetch();
			return new User($post['id'],$post['username'],$post['name'],$post['surname']);
		}
	}
?>