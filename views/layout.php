<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LSF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" lang="en" content="Lithuanian Student Forum">
    <meta name="author" content="Jaroslav Siroic, Darius Vasilevskas, Marius Vasiliauskas">
    <meta name="robots" content="index, follow">

    <!-- icons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Bootstrap Core CSS file -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Override CSS file - add your own CSS rules -->
    <link rel="stylesheet" href="assets/css/styles.css">
        <!-- JQuery scripts -->
    <script src="assets/js/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core scripts -->
    <script src="assets/tinymce/jquery.tinymce.min.js"></script>
    <script src="assets/tinymce/tinymce.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/ajax.js"></script>
    <script src="assets/js/validate.js"></script>
    <!-- Conditional comment containing JS files for IE6 - 8 -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Navigation -->
      <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">LSF</a>
        </div>
        <!-- /.navbar-header -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <!-- ^$header -->
          <?php if (!$_SESSION['user']->isLoggedIn()){ ?>
            <ul class="nav navbar-nav">
              <li><a href="#">Posts</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact Developer</a></li>
            </ul>
            <div class="header-buttons">
                <a href="?controller=pages&action=login" type="button" class="btn btn-default">Login</a>
                <a href="?controller=pages&action=register" type="button" class="btn btn-danger">Register</a>
            </div>
          <?php } else { ?>
            <ul class="nav navbar-nav">
              <li><a href="?controller=pages&action=myprofile">My profile</a></li>
              <li><a href="#">Contact Developer</a></li>
              <li><a href="#">View all users</a></li>
              <li><a href="#">About</a></li>
            </ul>
            <div class="header-buttons">
                <p class="header-text">Logged in as <?php echo $_SESSION['user']->name." ".$_SESSION['user']->surname ?></p>
                <a href="?controller=pages&action=logout" type="button" class="btn btn-danger">Logout</a>
            </div>
          <?php } ?>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <!-- /.navbar -->

    <!-- Page Content -->
    <div class="container-fluid">
      <div class="row">
          <?php require_once('routes.php'); ?>
      </div>
      <hr>

      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; LSF Forum 2016</p>
              </div>
          </div>
          <!-- /.row -->
      </footer>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

  </body>
</html>