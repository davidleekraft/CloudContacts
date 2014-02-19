<?php
	require_once("cred.php");
	
	$statement = $db->prepare('select image from content where id = :contact and ref = :id');
	
	$statement->execute(array(
				'contact' => $_GET['d'],
				'id' => $user['id']
			));
			
		if($statement->rowCount() == 0):
			header('HTTP/1.1 204 No Content');
			die();
		else:
			$row = $statement->fetch();
			header('Content-type: text/jpeg');
			echo $row['image'];
		endif;

?>