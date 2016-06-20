<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
<<<<<<< HEAD
  $controllers = array('pages' => ['home', 'error', 'login', 'logout', 'register', 'ok', 'myprofile', 'category', 'about', 'contact'],
                       'posts' => ['index', 'show', 'write', 'edit', 'delete']);
=======
  $controllers = array('pages' => ['home', 'error', 'login', 'logout', 'register', 'ok', 'myprofile', 'category', 'changeuser'],
                       'posts' => ['index', 'show', 'write', 'edit', 'delete', 'updatecomment', 'deletecomment']);
>>>>>>> 22ad8f42300b37e6a6d021e800c7f1723ca968f6

  if (array_key_exists($controller, $controllers) && in_array($action, $controllers[$controller])) {
      call($controller, $action);
  } else {
    call('pages', 'error');
  }
?>