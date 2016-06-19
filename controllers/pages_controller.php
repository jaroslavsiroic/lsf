<?php
  class PagesController {
    public function home() {
      require_once('models/category.php');
      $category = Category::all();
      require_once('views/pages/home.php');
    }

    public function myprofile() {
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
      //$cat = Category::find($_GET['id']);
      //masz stworzyc metode find w klasie Category :)
      //i uzhywac ten $cat jako objekt kategorii, wyswietlac opis, nazwe, oraz posty z tej kategorii
      //posty zrobim pozniej. Poprobuj puki co tylko to zrobic
      require_once('views/pages/category.php');
    }
  }
?>