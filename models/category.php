<?php
	class Category {
		public $id;
		public $title;
		public $content;

		public function __construct($id, $title, $content) {
			$this->id      = $id;
			$this->title  = $title;
			$this->content = $content;
	    }

	    public static function all() {
			$list = [];
			$db = Db::getInstance();
			$req = $db->query('SELECT * FROM category');

			// we create a list of Post objects from the database results
			foreach($req->fetchAll() as $cat) {
				$list[] = new Category($cat['id'], $cat['title'], $cat['content']);
			}

			return $list;
	    }

<<<<<<< HEAD
	    public static function find($id) {
	    $db = Db::getInstance();
      	require_once('models/category.php');
     	// we make sure $id is an integer
     	$id = intval($id);
     	$req = $db->prepare('SELECT * FROM category WHERE id = :id');

     	
			foreach($req->fetchAll() as $cat) {
				$list[] = new Category($cat['id'], $cat['title'], $cat['content']);
			}

			return $list;
	    }


=======
		public static function find($id) {
			$db = Db::getInstance();
			// we make sure $id is an integer
			$id = intval($id);
			$req = $db->prepare('SELECT * FROM category WHERE id = :id');
			// the query was prepared, now we replace :id with our actual $id value
			$req->execute(array('id' => $id));
			$post = $req->fetch();
			return new Category($post['id'],$post['title'],$post['content']);
		}
>>>>>>> 22ad8f42300b37e6a6d021e800c7f1723ca968f6
	}
?>