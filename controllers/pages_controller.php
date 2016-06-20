<?php
  class PagesController {
    public function home() {
      require_once('models/post.php');
      $posts = Post::all();
      usort($posts, "cmp_post_date");
      require_once('views/pages/home.php');
    }

    public function myprofile() {
      require_once('models/post.php');
      $posts = Post::allById($_SESSION['user']->id);
      usort($posts, "cmp_post_date");
      require_once('views/pages/myprofile.php');
    }
    
    public function error() {
      require_once('views/pages/error.php');
    }

    public function login() {
      require_once('views/pages/login.php');
    }

    public function logout() {
      $_SESSION['user']->logout();
      header('Location: ./');
    }

    public function register() {
      require_once('views/pages/register.php');
    }

    public function ok() {
      require_once('views/pages/ok.php');
    }

    public function category() {
      if (!isset($_GET['id']))
        return call('pages', 'error');
      require_once('models/category.php');
      $category = Category::all();
      require_once('models/post.php');
      $cat = Category::find($_GET['id']);
      $posts = Post::allByCategory($_GET['id']);
      usort($posts, "cmp_post_date");
      require_once('views/pages/category.php');
    }
    
    public static function changeuser() {
      if (!isset($_GET['change']))
        return call('pages', 'error');
      if ($_GET['change'] == 'name' || $_GET['change'] == 'surname' || $_GET['change'] == 'password')
        require_once('views/pages/changeUser.php');
      else return call('pages', 'error');
    }
  }
?>