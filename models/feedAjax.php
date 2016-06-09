<?php
	//if(!isset($_GET['feed'])) exit;
	/*require_once('connection.php');
	$db = Db::getInstance();
	try {
		$result = $db->prepare('INSERT INTO feedback(content) VALUES (:feed)');
		$result->execute(array('feed' => validate($_GET['feed'])));
		echo "Thank you for your feed!";
	} catch(PDOException $e) {
	    echo 'Cannot connect to database';
	}*/

	//$g=$_POST['param'];
	//print_r($g);
	echo "Hello from feedAjax";
?>