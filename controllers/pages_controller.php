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

    public function about() {
      require_once('views/pages/about.php');
    }

    public function contact() {
      require_once('views/pages/contact.php');
    }

    public function allusers() {
      $users = User::all();
      require_once('views/pages/allUsers.php');
    }
    
    public function changeuser() {
      if (!isset($_GET['change']))
        return call('pages', 'error');
      if ($_GET['change'] == 'name' || $_GET['change'] == 'surname' || $_GET['change'] == 'password')
        require_once('views/pages/changeUser.php');
      else return call('pages', 'error');
    }

    public function userprofile() {
      if (!isset($_GET['id']))
        return call('pages', 'error');
      require_once('models/post.php');
      if ($_GET['id'] == $_SESSION['user']->id) {
        $posts = Post::allById($_SESSION['user']->id);
        usort($posts, "cmp_post_date");
        require_once('views/pages/myprofile.php');
      } else {
        $user = User::find($_GET['id']);
        $posts = Post::allById($_GET['id']);
        usort($posts, "cmp_post_date");
        require_once('views/pages/userProfile.php');
      }
    }
  }
?>