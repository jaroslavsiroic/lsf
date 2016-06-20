<div class="col-lg-8">
    <h1><?php echo $user->name ?> profile</h1>
    <h3>Username: <?php echo $user->username; ?></h3>
    <h3>Name: <?php echo $user->name ?></h3>
    <h3>Surname: <?php echo $user->surname ?></h3>
    
    <hr><h3>User posts</h3>
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
            </div>
        </div>
    <?php } ?>
</div>
<!-- Blog Sidebar Widgets Column -->
<?php require_once('views/widgets.php'); ?>
