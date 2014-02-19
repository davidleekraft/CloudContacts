<?php
require_once('import.php');
	
	session_start();

	if(isset($_SESSION['prometheus'])):
		header('Location: main.php');
		die();
	endif;
	
	$data = array(
		'username' => array(
			'value' => '',
			'errors' => array()),
		'passwd' => array(
			'value' => '',
			'errors' => array())
	);
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'):
		//check username
		if(!isset($_POST['username'])):
			$data['username']['errors'][] = 'No username entered';
		elseif(strlen($_POST['username']) == 0):
			$data['username']['errors'][] = 'No username entered';
		else:
			$data['username']['value'] = trim(strtolower($_POST['username']));
		endif;
		
		//check password
		if(!isset($_POST['passwd'])):
			$data['passwd']['errors'][] = 'No password entered';
		elseif(strlen($_POST['passwd']) == 0):
			$data['passwd']['errors'][] = 'No password entered';
		else:
			$data['passwd']['value'] = $_POST['passwd'];
		endif;
		
		//count total number of errors
		$errors = 0;
		foreach($data as $field):
			$errors += count($field['errors']);
		endforeach;
		
		if($errors == 0):
			//check if username/password match database
			$statement = $db->prepare(
				"select id from credentials where username = :username and passwd = sha1(:passwd)");
			
			$statement->execute(array(
				'username' => $data['username']['value'],
				'passwd' => $data['passwd']['value']
			));
			
			$id = $statement->fetch();
			if($id !== false):
                $_SESSION['prometheus'] = $id[0];
                header('Location: main.php');
                die();
            else:
                $data['passwd']['errors'][] = 'Invalid username or password';
            endif;
		endif;
	endif;
?>