<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=localhost;dbname=jdm', 'root', '', $pdo_options);
      }
      return self::$instance;
    }
  }
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function cmp_post_date($a, $b) {
    return strcmp($b->date, $a->date);
  }
  require_once('models/user.php');
  session_start();
  if(!isset($_SESSION['user'])) $_SESSION['user'] = new User(null, null, null, null);

 // zdarova
?>