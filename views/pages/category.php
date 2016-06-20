<div class="col-lg-8">
    <h1>Category name here</h1>
    <h2>Category content here</h2>
</div>
<div class="col-md-4">
    <div class="well">
        <h4>Other Forum Categories</h4>
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