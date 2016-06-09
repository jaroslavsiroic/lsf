<?php
  class PagesController {
    public function home() {
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
  }
?>