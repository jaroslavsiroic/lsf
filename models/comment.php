<?php
	class Comment {
		public $content;
		public $date;
		public $user; //user object
		
		public function __construct ($content, $date, $user) {
			$this->content = $content;
			$this->date = $date;
			$this->user = $user;
		}
		public static function saveCom($content, $post_id) {
			$db = Db::getInstance();

			$post_id = intval($post_id);

			$date = date('Y-m-d');

			try {
				$result = $db->prepare('INSERT INTO comment(content, date, id_user, id_post) VALUES (:content , :date, :user, :id_post)');
				$result->execute(array('content' => $content, 'date' => $date, 'user' => $_SESSION['user']->id, 'id_post' => $post_id));
			} catch(PDOException $e) {
			  echo '<p class="error">Error saveing comment!</p>';
			}
		}
		public static function all($id) {
			$db = Db::getInstance();
			// we make sure $id is an integer
			$id = intval($id);
			$req = $db->prepare('SELECT * FROM comment inner join user WHERE comment.id_post = :id and user.id = comment.id_user');
			// the query was prepared, now we replace :id with our actual $id value
			$req->execute(array('id' => $id));
			$list = array();
			foreach($req->fetchAll() as $com) {
				$list[] = new Comment($com['content'], $com['date'], new User($com['id_user'], $com['username'], $com['name'], $com['surname']));
			}
			return $list;
		}
	}
?>