<div class="col-lg-8">
	
	<h3>Lithuanian Student Forum</h3>
  	<!--<script>tinymce.init({ selector:'textarea' });</script>-->

    <?php
    if ($_SESSION['user']->isLoggedIn()) {
        echo '<a style="width: 98%; magrin: auto; height: 50px; margin: 10px" href="?controller=posts&action=write" type="button" class="btn btn-success"><font size="6">Write new Post!</font></a>';
    }
    echo "<hr><p>List of all posts:</p>";
    foreach($posts as $post) { 
    ?>
    <div class="media">
        <a class="pull-left" href="#">
            <img style="max-width: 64px; max-height: 64px" class="media-object" src="assets/img/user256.png" alt="">
        </a>
        <div class="media-body">
            <a href="?controller=posts&action=show&id=<?php echo $post->id; ?>" >
                <h3 class="media-heading"> <?php echo $post->title;  ?> </h3>
            </a>
            <h4 class="media-heading">Author: <a href="?controller=pages&action=user&id=<?php echo $post->author->id; ?>" ><?php echo $post->author->name.' '.$post->author->surname; ?></a>
                <small>
                    <?php echo $post->date; ?>
                    </br>
                    Category: <a href="?controller=pages&action=category&id= <?php echo $post->category->id; ?>" ><?php echo $post->category->title;?></a>
                </small>
            </h4>
            <p class="lead"><?php echo $post->headline; ?></p>
        </div>
    </div>
    <?php } ?>
</div>

<!-- Blog Sidebar Widgets Column -->
<?php require_once('views/widgets.php'); ?>