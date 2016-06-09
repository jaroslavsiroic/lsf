<div class="wellForm">
	<h3>Registration form</h3>
	<div class="well">
		<form action="" method="post" onsubmit="return validate(this)">
			<div class="form-group">
				<label for="nick">Username<span class="star">*</span></label>
				<input type="text" class="form-control" id="nick" name="nick" placeholder="Enter username">
				<p class="help-block">You will use username to login</p>
			</div>
			<div class="form-group">
				<label for="name">Name<span class="star">*</span></label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
			</div>
			<div class="form-group">
				<label for="surname">Surname<span class="star">*</span></label>
				<input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname">
			</div>
			<div class="form-group">
				<label for="pass">Password<span class="star">*</span></label>
				<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter password">
				<p class="help-block">Password in database is not hashed! Use simple password</p>
			</div>
			<p><span class="star">*</span> Has to be submitted</p>
			<button type="submit" class="btn btn-primary">Register</button>
		</form>
	</div>
	<p class="error" id="fail"></p>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION['user']->register($_POST['nick'], $_POST['name'], $_POST['surname'], $_POST['pass']);
}//end if submit
?>