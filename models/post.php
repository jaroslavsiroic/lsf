<?php
  class Post {
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
      require_once('models/category.php');
      $req = $db->query('SELECT p.id as id, p.date as date, p.title as title, p.headline as headline, u.id as id_user, u.name as name, u.surname as surname, c.id as cat_id, c.title as cat_title FROM post p inner join user u inner join category c where u.id = p.id_user and p.id_category = c.id');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['date'], $post['title'], $post['headline'], 0, new User($post['id_user'], 0, $post['name'], $post['surname']), new Category($post['cat_id'],$post['cat_title'],0));
      }
      return $list;
    }

    public static function allById($id) { // all user posts
      $list = [];
      $id = intval($id);
      require_once('models/category.php');
      $db = Db::getInstance();
      $req = $db->query('SELECT p.id as id, p.date as date, p.title as title, p.headline as headline, c.id as cat_id, c.title as cat_title FROM post p inner join category c WHERE p.id_category = c.id and id_user = '.$id);
      $req->execute(array('id' => $id));
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['date'], $post['title'], $post['headline'], 0, 0, new Category($post['cat_id'],$post['cat_title'],0));
      }
      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      require_once('models/category.php');
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT p.id as id, p.date as date, p.title as title, p.headline as headline, p.content as content, u.id as id_user, u.name as name, u.username as username, u.surname as surname, c.id as cat_id, c.title as cat_title FROM post p inner join user u inner join category c where u.id = p.id_user and p.id_category = c.id and p.id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();
      return new Post($post['id'], $post['date'], $post['title'], $post['headline'], $post['content'], new User($post['id_user'], $post['username'], $post['name'], $post['surname']), new Category($post['cat_id'],$post['cat_title'],0));
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
          echo '<p class="error">Error saving post!</p>'. $e;
      }
    }
    public static function edit($id, $title, $headline, $content, $category) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare('UPDATE post SET content=:content, title=:title, headline=:headline, id_category=:category WHERE id =:id');

      $req->execute(array('id' => $id, 'content' => $content, 'title' => $title, 'headline' => $headline, 'category' => $category));
    }

    public static function delete($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare('DELETE FROM post WHERE id = :id');

      $req->execute(array('id' => $id));
    }
  }
?>