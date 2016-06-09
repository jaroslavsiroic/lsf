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
  $controllers = array('pages' => ['home', 'error', 'login', 'logout', 'register', 'ok', 'myprofile'],
                       'posts' => ['index', 'show', 'write']);

  if (array_key_exists($controller, $controllers) && in_array($action, $controllers[$controller])) {
      call($controller, $action);
  } else {
    call('pages', 'error');
  }
?>