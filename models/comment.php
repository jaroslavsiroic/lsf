<?php
	class Comment {
		public $id;
		public $content;
		public $date;
		public $user; //user object
		
		public function __construct ($id, $content, $date, $user) {
			$this->id	= $id;
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
			  echo '<p class="error">Error saving comment!</p>';
			}
		}
		public static function all($id) {
			$db = Db::getInstance();
			// we make sure $id is an integer
			$id = intval($id);
			$req = $db->prepare('SELECT c.id as cid, c.content, c.date, c.id_user, u.username, u.name, u.surname FROM comment c inner join user u WHERE c.id_post = :id and u.id = c.id_user');
			// the query was prepared, now we replace :id with our actual $id value
			$req->execute(array('id' => $id));
			$list = array();
			foreach($req->fetchAll() as $com) {
				$list[] = new Comment($com['cid'], $com['content'], $com['date'], new User($com['id_user'], $com['username'], $com['name'], $com['surname']));
			}
			return $list;
		}

		public static function update($id, $content) {
			$db = Db::getInstance();

			$id = intval($id);
			$req = $db->prepare('UPDATE comment SET content=:content WHERE id =:id');

			$req->execute(array('id' => $id, 'content' => $content));
		}

		public static function delete($id) {
			$db = Db::getInstance();

			$id = intval($id);
			$req = $db->prepare('DELETE FROM comment WHERE id = :id');

			$req->execute(array('id' => $id));
		}

		public static function find($id) {
			$db = Db::getInstance();
			// we make sure $id is an integer
			$id = intval($id);
			$req = $db->prepare('SELECT * FROM comment WHERE id = :id');
			// the query was prepared, now we replace :id with our actual $id value
			$req->execute(array('id' => $id));
			$post = $req->fetch();
			return new Comment($post['id'],$post['content'],$post['date'],$post['id_user']);
		}
	}
?>