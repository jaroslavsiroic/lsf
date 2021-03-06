<?php
  class PostsController {
    public function index() {
      // we store all the posts in a variable
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');
      require_once('models/comment.php');
      // we use the given id to get the right post
      $post = Post::find($_GET['id']);
      $coms = Comment::all($_GET['id']);
      usort($coms, "cmp_post_date");
      require_once('views/posts/show.php');
    }

    public function write() {
      require_once('models/category.php');
      $cats = Category::all();
      require_once('views/posts/write.php');
    }

    public function edit() {
      if (!isset($_GET['id']))
        return call('pages', 'error');
      require_once('models/category.php');
      $cats = Category::all();
      $post = Post::find($_GET['id']);
      if ($post->author->id == $_SESSION['user']->id)
        require_once('views/posts/edit.php');
      else return call('pages', 'error');
    }

    public function delete() {
      if (!isset($_GET['id']) || !isset($_GET['postid']))
        return call('pages', 'error');
      require_once('models/post.php');
      Post::delete($_GET['id']);
      header('Location: ?controller=pages&action=myprofile');
    }

    public function deletecomment() {
      if (!isset($_GET['id']))
        return call('pages', 'error');
      require_once('models/comment.php');
      $com = Comment::find($_GET['id']);
      if ($_SESSION['user']->id == $com->user->id)
        Comment::delete($_GET['id']);
      else return call('pages', 'error');

      header('Location: ?controller=posts&action=show&id='.$_GET['postid']);
    }

    public function updatecomment() {
      if (!isset($_GET['id']) || !isset($_GET['postid']))
        return call('pages', 'error');
      require_once('models/comment.php');
      $com = Comment::find($_GET['id']);
      if ($_SESSION['user']->id == $com->user)
        require_once('views/posts/updateComment.php');
      else return call('pages', 'error');
    }
  }
?>