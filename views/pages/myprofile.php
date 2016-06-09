<?php
	if(!$_SESSION['user']->isLoggedIn() ){ header('Location: ./'); } 
?>
<h3>My profile</h3>
<h4><?php echo $_SESSION['user']->name.' '.$_SESSION['user']->surname; ?></h4>
<small><?php echo $_SESSION['user']->username; ?></small>

<hr><h3>My posts</h3>
<?php
require_once('models/post.php');
$posts = Post::allById($_SESSION['user']->id); 
foreach($posts as $post) { ?>
<div class="media">
    <a class="pull-left" href="#">
        <img style="max-width: 64px; max-height: 64px" class="media-object" src="assets/img/user256.png" alt="
        ">
    </a>
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
    </div>
</div>
<?php } ?>