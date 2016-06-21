<div class="col-lg-8">
    <h1>All users</h1>
    <br>
    <?php foreach ($users as $user) {  ?>
        <h4><a href="?controller=pages&action=userprofile&id=<?php echo $user->id; ?>"> <?php echo $user->name.' '.$user->surname; ?></a></h4>
        <h5>Username: <?php echo $user->username ?></h5>
    <?php } ?>
</div
<!-- Blog Sidebar Widgets Column -->
<?php require_once('views/widgets.php'); ?>