<?php
if(!$_SESSION['user']->isLoggedIn() ){ header('Location: ./'); }
?>
    <div class="wellForm">
        <h3>Change <?php echo $_GET['change']; ?></h3>
        <div class="well">
            <form action="" method="post">
                <div class="form-group">
                    <label for="contactPassword">Password</label>
                    <input type="password" class="form-control" id="contactPassword" name="pass" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="contactName">New <?php echo $_GET['change']; ?></label>
                    <input type="<?php if ($_GET['change'] == 'password') echo 'password'; else echo 'text'; ?>" class="form-control" id="contactName" name="changeV" placeholder="Enter new <?php echo $_GET['change']; ?>">
                </div>
                <input type="hidden" value="<?php echo $_GET['change']; ?>" name="change">
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //password name surname
    if($_SESSION['user']->change($_POST["change"], $_POST['changeV'], $_POST["pass"])){
        header('Location: ?controller=pages&action=myprofile');
        exit;
    } else {
        $message = '<p class="error">Wrong password! Aborting change</p>';
    }
}//end if submit

if(isset($message)){ echo $message; }
?>