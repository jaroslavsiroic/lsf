<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $date;
    public $title;
    public $headline;
    public $content;
    public $author;
    public $category;

    public function __construct($id, $date, $title, $headline, $content, $author, $category) {
      $this->id       = $id;
      $this->author   = $author;
      $this->content  = $content;
      $this->title    = $title;
      $this->headline = $headline;
      $this->category = $category;
      $this->date     = $date;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT p.id as id, p.date as date, p.title as title, p.headline as headline, u.id as id_user, u.name as name, u.surname as surname FROM post p inner join user u where u.id = p.id_user');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['date'], $post['title'], $post['headline'], 0, new User($post['id_user'], 0, $post['name'], $post['surname']), 1);
      }
      return $list;
    }

    public static function allById($id) {
      $list = [];
      $id = intval($id);
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM post WHERE id_user = '.$id);
      $req->execute(array('id' => $id));
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['date'], $post['title'], $post['headline'], 0, 0, 1);
      }
      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM post inner join user WHERE post.id = :id and post.id_user = user.id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();
      return new Post($post['id'], $post['date'], $post['title'], $post['headline'], $post['content'], new User($post['id_user'], $post['username'], $post['name'], $post['surname']), 1);
    }

    public static function savePost($title, $headline, $content, $category) {
      $db = Db::getInstance();

      $title = validate($title);
      $headline = validate($headline);
      $category = intval($category);

      $date = date('Y-m-d');

      try {
        $result = $db->prepare('INSERT INTO post(title, headline, content, date, id_user, id_category) VALUES (:title , :headline , :content , :date, :user, :cat)');
        $result->execute(array('title' => $title, 'headline' => $headline, 'content' => $content, 'date' => $date, 'user' => $_SESSION['user']->id, 'cat' => $category));
      } catch(PDOException $e) {
          echo '<p class="error">Error saveing post!</p>'. $e;
      }
    }
  }
?>