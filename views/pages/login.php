<?php
if($_SESSION['user']->isLoggedIn() ){ header('Location: ./'); } 
?>
<div class="wellForm">
	<h3>Login form</h3>
	<div class="well">
		<form action="" method="post">
			<div class="form-group">
				<label for="contactName">Username</label>
				<input type="text" class="form-control" id="contactName" name="nick" placeholder="Enter username">
			</div>
			<div class="form-group">
				<label for="contactPassword">Password</label>
				<input type="password" class="form-control" id="contactPassword" name="pass" placeholder="Enter password">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>	
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if($_SESSION['user']->login($_POST["nick"],$_POST["pass"])){ 
		header('Location: ./');
		exit;
	} else {
		$message = '<p class="error">Wrong nickname / password combination</p>';
	}
}//end if submit

if(isset($message)){ echo $message; }
?>