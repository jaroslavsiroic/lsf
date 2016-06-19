<?php
	if(!$_SESSION['user']->isLoggedIn() ){ header('Location: ./'); } 
?>
<h3>My profile</h3>
<h4><?php echo $_SESSION['user']->name.' '.$_SESSION['user']->surname; ?></h4>
<h4>Username: <?php echo $_SESSION['user']->username; ?></h4>

<hr><h3>My posts</h3>
<?php
require_once('models/post.php');
$posts = Post::allById($_SESSION['user']->id); 
foreach($posts as $post) { ?>
<div class="media well">
    <div class="media-body">
        <a href="?controller=posts&action=show&id=<?php echo $post->id; ?>" >
            <h3 class="media-heading"> <?php echo $post->title;  ?> </h3>
        </a>
        <h4 class="media-heading">
            <small>
                <?php echo $post->date; ?>
            </small>
        </h4>
        <p class="lead"><?php echo $post->headline; ?></p>
        <a href="?controller=posts&action=edit&id=<?php echo $post->id; ?>" type="button" class="btn btn-success">Edit</a>
        <a href="?controller=posts&action=delete&id=<?php echo $post->id; ?>" type="button" class="btn btn-danger">Delete</a>
    </div>
</div>
<?php } ?>