<?php
	if(!$_SESSION['user']->isLoggedIn() ){ header('Location: ./'); } 
?>
<div class="col-lg-8">
<h1>My profile</h1>
<h3>Username: <?php echo $_SESSION['user']->username; ?></h3>
<h3>Name: <?php echo $_SESSION['user']->name ?></h3>
<h3>Surname: <?php echo $_SESSION['user']->surname ?></h3>
<ul class="list-inline">
    <li><a style="margin-top: 10px" href="?controller=posts&action=edit" type="button" class="btn btn-success">Change Name</a></li>
    <li><a style="margin-top: 10px" href="?controller=posts&action=edit" type="button" class="btn btn-success">Change Surname</a></li>
    <li><a style="margin-top: 10px" href="?controller=posts&action=edit" type="button" class="btn btn-success">Change Password</a></li>
</ul>
<hr><h3>My posts</h3>
<?php
foreach($posts as $post) { ?>
<div class="media well">
    <div class="media-body">
        <a href="?controller=posts&action=show&id=<?php echo $post->id; ?>" >
            <h3 class="media-heading"> <?php echo $post->title;  ?> </h3>
        </a>
        <h4 class="media-heading">
            <small>
                <b>Category:</b>
                <a href="?controller=pages&action=category&id=<?php echo $post->category->id; ?>" >
                    <?php echo $post->category->title; ?>
                </a>
                <b>Posted on:</b>
                <?php echo $post->date; ?>
            </small>
        </h4>
        <p class="lead"><?php echo $post->headline; ?></p>
        <a href="?controller=posts&action=edit&id=<?php echo $post->id; ?>" type="button" class="btn btn-success">Edit</a>
        <a href="?controller=posts&action=delete&id=<?php echo $post->id; ?>" type="button" class="btn btn-danger">Delete</a>
    </div>
</div>
<?php } ?>
</div>
<!-- Blog Sidebar Widgets Column -->
<?php require_once('views/widgets.php'); ?>
