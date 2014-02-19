<?php require_once('import.php');

	$data = array(
		'username' => array(
			'value' => '',
			'errors' => array()),
		'passwd' => array(
			'value' => '',
			'errors' => array()),
		'passwd2' => array(
			'value' => '',
			'errors' => array()),
		'fname' => array(
			'value' => '',
			'errors' => array()),
		'lname' => array(
			'value' => '',
			'errors' => array()),
		'email' => array(
			'value' => '',
			'errors' => array()),
		'email2' => array(
			'value' => '',
			'errors' => array()));
			
	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		//Username Validation
		if(!isset($_POST['username']))
		{
			$data['username']['errors'][] = 'No Username Given';
		}
		else
		{
			$data['username']['value'] = (trim($_POST['username']));
			
			$testdata = $data['username']['value'];
			$statement = $db->prepare("select * from credentials where username = :testdata");
			$statement->execute(array('testdata' => $testdata));
			$validate = $statement->fetch();
			
			if($validate !== false)
			{
				$data['username']['errors'][] = 'Username Already Taken';
			}
			elseif(strlen($data['username']['value']) < 1)
			{
				$data['username']['errors'][] = 'Username Cannot Be Blank';
			}
			elseif(strlen($data['username']['value']) < 6)
			{
				$data['username']['errors'][] = 'Username Is Too Short';
			}
			elseif(strlen($data['username']['value']) > 25)
			{
				$data['username']['errors'][] = 'Username Is Too Long';
			}
			
		}
		//Password Validation
		if(!isset($_POST['passwd']))
		{
			$data['passwd']['errors'][] = 'No Password Given';
		}
		else
		{
			$data['passwd']['value'] = (trim($_POST['passwd']));
			
			if(strlen($data['passwd']['value']) < 1)
			{
				$data['passwd']['errors'][] = 'Password Cannot Be Blank';
			}
			elseif(strlen($data['passwd']['value']) < 6)
			{
				$data['passwd']['errors'][] = 'Password Is Too Short';
			}
			elseif(strlen($data['passwd']['value']) > 25)
			{
				$data['passwd']['errors'][] = 'Password Is Too Long';
			}
		}
		//Password Re-Enter Validation
		if(isset($_POST['passwd2']))
		{
			$data['passwd2']['value'] = (trim($_POST['passwd2']));
			
			if($_POST['passwd2'] !== $data['passwd']['value'])
			{
				$data['passwd2']['errors'][] = 'Passwords Do Not Match';
			}
		}
		//First Name Validation
		if(!isset($_POST['fname']))
		{
			$data['fname']['errors'][] = 'No First Name Given';
		}
		else
		{
			$data['fname']['value'] = (trim($_POST['fname']));
			
			if(strlen($data['fname']['value']) < 1)
			{
				$data['fname']['errors'][] = 'First Name Cannot Be Blank';
			}
			elseif(strlen($data['fname']['value']) < 2)
			{
				$data['fname']['errors'][] = 'First Name Is Too Short';
			}
			elseif(strlen($data['fname']['value']) > 25)
			{
				$data['fname']['errors'][] = 'First Name Is Too Long';
			}
		}
		//Last Name Validation
		if(!isset($_POST['lname']))
		{
			$data['lname']['errors'][] = 'No Last Name Given';
		}
		else
		{
			$data['lname']['value'] = (trim($_POST['lname']));
			
			if(strlen($data['lname']['value']) < 1)
			{
				$data['lname']['errors'][] = 'Last Name Cannot Be Blank';
			}
			elseif(strlen($data['lname']['value']) < 2)
			{
				$data['lname']['errors'][] = 'Last Name Is Too Short';
			}
			elseif(strlen($data['lname']['value']) > 25)
			{
				$data['lname']['errors'][] = 'Last Name Is Too Long';
			}
		}
		//Email Validation
		if(!isset($_POST['email']))
		{
			$data['email']['errors'][] = 'No Email Given';
		}
		else
		{
			$data['email']['value'] = (trim($_POST['email']));
			
			$testdata = $data['email']['value'];
			$statement = $db->prepare("select * from credentials where email = :testdata");
			$statement->execute(array('testdata' => $testdata));
			$validate = $statement->fetch();
			
			if($validate !== false)
			{
				$data['email']['errors'][] = 'There is already an account associated with that email.';
			}
			elseif(strlen($data['email']['value']) < 1)
			{
				$data['email']['errors'][] = 'Email Cannot Be Blank';
			}
			elseif(!filter_var(($data['email']['value']), FILTER_VALIDATE_EMAIL))
			{
				$data['email']['errors'][] = 'Email Address Entered Is Invalid';
			}
		}
		//Email Re-Enter Validation
		if(isset($_POST['email2']))
		{
			$data['email2']['value'] = (trim($_POST['email2']));
			
			if($_POST['email2'] !== $data['email']['value'])
			{
				$data['email2']['errors'][] = 'Email Addresses Do Not Match';
			}
		}
		//Calculate Number Of Errors
		$total_errors = 0;
		foreach($data as $a)
		{
			$total_errors = $total_errors + (count($a['errors']));
		}
		//If No Errors: Process Add User
		if($total_errors < 1)
		{
			try{ 	
				$statement = $db->prepare(
					"insert into credentials(username, passwd, fname, lname, email)
						values(:username, sha1(:passwd), :fname, :lname, :email)");
				
				$statement -> execute(array(
					'username' => $data['username']['value'],
					'passwd' => $data['passwd']['value'],
					'fname' => $data['fname']['value'],
					'lname' => $data['lname']['value'],
					'email' => $data['email']['value']
					));
					
					header('Location: index.php');
					exit();
				}
				catch(PDOException $e){
					die("The storage of your data has encountered an unexpected error. + $e");
				}
		}
	}
?>