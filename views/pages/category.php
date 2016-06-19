<?php
	if(!$_SESSION['user']->isLoggedIn() ){ header('Location: ./'); } 
?>

<?php
require_once('models/category.php');
$category = Category::all();
foreach($category as $cat) { ?>


        <a href="?controller=category&action=show&id=<?php echo $cat->id; ?>" >
            <h3 class="media-heading"> <?php echo $cat->title;  ?> </h3>
        </a>

<?php } ?>