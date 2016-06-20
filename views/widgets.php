<?php
require_once('models/category.php');
$category = Category::all();
?>
<div class="col-md-4">
    <img src="http://www.technologijos.lt/upload/image/n/pranesimai_spaudai/S-30037/2-1-lietuvos_studentu_forumas.png">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Forum Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Forum Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <?php foreach($category as $cat) { ?>
                    <a style="display: inline-block" href="?controller=pages&action=category&id=<?php echo $cat->id; ?>" >
                        <h4 class="media-heading"> <?php echo $cat->title;  ?> </h4>
                    </a>
                <?php } ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>