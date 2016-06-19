<div class="col-lg-8">
    <h1>Category name here</h1>
    <h2>Category content here</h2>
</div>
<div class="col-md-4">
    <div class="well">
        <h4>Other Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <?php foreach($category as $cat) { ?>
                    <a href="?controller=pages&action=category&id=<?php echo $cat->id; ?>" >
                        <h3 class="media-heading"> <?php echo $cat->title;  ?> </h3>
                    </a>
                <?php } ?>


            </div>
        </div>
        <!-- /.row -->
    </div>
</div>