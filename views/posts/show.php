<!-- Blog Post Content Column -->
<div class="col-lg-8">

    <!-- Blog Post -->

    <!-- Title -->
    <h1><?php echo $post->title; ?></h1>

    <!-- Author -->
    <p class="lead">
        by <a href="?controller=pages&action=userprofile&id=<?php echo $post->author->id; ?>"><?php echo $post->author->name.' '.$post->author->surname; ?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post->date; ?></p>

    <hr>

    <!-- Post Content -->
    <p class="lead">
        <?php echo $post->headline; ?>
    </p>

    <hr>
    <div>
        <?php echo $post->content; ?>
    </div>
    <hr>

    <!-- Blog Comments -->
    <?php if ($_SESSION['user']->isLoggedIn()) { ?>
        <script>
        tinymce.init({
            selector: 'textarea',
            height: 100,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'styleselect | bold italic | bullist numlist outdent indent | link image media',
            content_css : 'assets/css/editorStyle.css'
        });
        </script>
        <!-- Comments Form -->
        <h4>Leave a Comment:</h4>
        <form role="form" action="" method="post" onsubmit="return valCom(this)">
            <div class="form-group">
                <textarea name="content" id="content" style="max-width: 100%" class="form-control" rows="3"></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
            <input type="Submit" class="btn btn-primary" value="Submit">
        </form>
        <p class="error" id="fail"></p>
        <hr>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            Comment::saveCom($_POST['content'], $_POST['post_id']);
        }
    } else { ?>
        <p class="error">You have to be logged in to write a comment<p>
        <hr>
    <?php } ?>

    <!-- Posted Comments -->

    <!-- Comment -->
    <?php foreach($coms as $com) { ?>
    <div class="media well">
        <a class="pull-left" href="#">
            <img style="max-width: 64px; max-height: 64px" class="media-object" src="assets/img/user256.png" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"> <?php echo $com->user->name.' '.$com->user->surname; ?>
                <small><?php echo $com->date; ?></small>
            </h4>

            <?php echo $com->content; if ($_SESSION['user']->id == $com->user->id){?>
                <a href="?controller=posts&action=updatecomment&id=<?php echo $com->id; ?>&postid=<?php echo $post->id; ?>" type="button" class="btn btn-success">Edit</a>
            <?php } if ($_SESSION['user']->id == $com->user->id || $_SESSION['user']->id == $post->author->id){?>
                <a href="?controller=posts&action=deletecomment&id=<?php echo $com->id; ?>&postid=<?php echo $post->id; ?>" type="button" class="btn btn-danger">Delete</a>
            <?php } ?>
        </div>
    </div>
    <?php } ?>

</div>

<!-- Blog Sidebar Widgets Column -->
<?php require_once('views/widgets.php'); ?>