<?

	//Set up data array
	$data = array(
		'fname' => array(
			'value' => '',
			'errors' => array()),
		'minitial' => array(
			'value' => '',
			'errors' => array()),
		'lname' => array(
			'value' => '',
			'errors' => array()),
		'email' => array(
			'value' => '',
			'errors' => array()),
		'street' => array(
			'value' => '',
			'errors' => array()),
		'street2' => array(
			'value' => '',
			'errors' => array()),
		'apt' => array(
			'value' => '',
			'errors' => array()),
		'city' => array(
			'value' => '',
			'errors' => array()),
		'state' => array(
			'value' => '',
			'errors' => array()),
		'zip' => array(
			'value' => '',
			'errors' => array()),
		'hphonepre' => array(
			'value' => '',
			'errors' => array()),
		'hphone' => array(
			'value' => '',
			'errors' => array()),
		'hphoneext' => array(
			'value' => '',
			'errors' => array()),
		'mphonepre' => array(
			'value' => '',
			'errors' => array()),
		'mphone' => array(
			'value' => '',
			'errors' => array()),
		'file' => array(
			'value' => '',
			'errors' => array()),
		'id' => array(
			'value' => '',
			'errors' => array()));

//If page request is GET
if($_SERVER['REQUEST_METHOD'] === 'GET')
{
	//Check to see that contact id is given
	if(!isset($_GET['d']))
	{
		header('Location: view.php');
		exit();
	}
	else
	{
		//Populate sticky form with contact details
		$edit = $db->prepare('select * from content where id = :id and ref = :ref');
		$edit->execute(array(
			'id' => $_GET['d'],
			'ref' => $user['id']));
		$contact = $edit->fetch();
		
		if($contact == false)
		{
			header('Location: view.php');
			exit();
		}
		else
		{
			$data['fname']['value'] = $contact['fname'];
			$data['minitial']['value'] = $contact['minitial'];
			$data['lname']['value'] = $contact['lname'];
			$data['email']['value'] = $contact['email'];
			$data['street']['value'] = $contact['street'];
			$data['street2']['value'] = $contact['street2'];
			$data['apt']['value'] = $contact['apt'];
			$data['city']['value'] = $contact['city'];
			$data['state']['value'] = $contact['state'];
			$data['zip']['value'] = $contact['zip'];
			$data['hphonepre']['value'] = $contact['hphonepre'];
			$data['hphone']['value'] = $contact['hphone'];
			$data['hphoneext']['value'] = $contact['hphoneext'];
			$data['mphonepre']['value'] = $contact['mphonepre'];
			$data['mphone']['value'] = $contact['mphone'];
			$data['id']['value'] = $_GET['d'];
			
		}
	}
}			

//If page request is POST
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	
	//FORM VALIDATION
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
		elseif(strlen($data['fname']['value']) > 25)
		{
			$data['fname']['errors'][] = 'First Name Should Be Less Than 25 Characters.';
		}
	}
	
	if(isset($_POST['minitial']))
	{
		$data['minitial']['value'] = (trim($_POST['minitial']));
		
		if(strlen($data['minitial']['value']) > 1)
		{
			$data['minitial']['errors'][] = 'Middle Initial Cannot Be Longer Than 1 Character.';
		}
	}
	
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
		elseif(strlen($data['lname']['value']) > 25)
		{
			$data['lname']['errors'][] = 'Last Name Should Be Less Than 25 Characters.';
		}
	}
	
	if(isset($_POST['email']))
	{
		$data['email']['value'] = (trim($_POST['email']));
		
		if(strlen($data['email']['value']) > 50)
		{
			$data['email']['errors'][] = 'Email Should Be Less Than 50 Characters.';
		}
	}
	
	if(isset($_POST['street']))
	{
		$data['street']['value'] = (trim($_POST['street']));
		
		if(strlen($data['street']['value']) > 50)
		{
			$data['street']['errors'][] = 'Street Address Should Be Less Than 50 Characters.';
		}
	}
	
	if(isset($_POST['street2']))
	{
		$data['street2']['value'] = (trim($_POST['street2']));
		
		if(strlen($data['street2']['value']) > 50)
		{
			$data['street2']['errors'][] = 'Street 2 Address Should Be Less Than 50 Characters.';
		}
	}
	
	if(isset($_POST['apt']))
	{
		$data['apt']['value'] = (trim($_POST['apt']));
		
		if(strlen($data['apt']['value']) > 15)
		{
			$data['apt']['errors'][] = 'APT / UNIT Should Be Less Than 15 Characters.';
		}
	}
	
	if(isset($_POST['city']))
	{
		$data['city']['value'] = (trim($_POST['city']));
		
		if(strlen($data['city']['value']) > 50)
		{
			$data['city']['errors'][] = 'City Should Be Less Than 50 Characters.';
		}
	}
	
	if(isset($_POST['state']))
	{
		$data['state']['value'] = (trim($_POST['state']));
		
		if(strlen($data['state']['value']) > 2)
		{
			$data['state']['errors'][] = 'State Should Be 2 Characters.';
		}
	}
	
	if(isset($_POST['zip']))
	{
		$data['zip']['value'] = (trim($_POST['zip']));
		
		if(strlen($data['zip']['value']) > 10)
		{
			$data['zip']['errors'][] = 'Zip Code Should Be Less Than 10 Characters.';
		}
	}
	if((isset($_POST['hphonepre'])) && (strlen($_POST['hphonepre']) > 0))
	{
		$data['hphonepre']['value'] = (trim($_POST['hphonepre']));
		
		if(strlen($data['hphonepre']['value']) != 3)
		{
			$data['hphonepre']['errors'][] = 'Home Phone Prefix Should Be 3 Numbers.';
		}
		elseif(!is_numeric($data['hphonepre']['value']))
		{
			$data['hphonepre']['errors'][] = 'Home Phone Prefix Should Be Numeric Only.';
		}
	}
	if((isset($_POST['hphone'])) && (strlen($_POST['hphone']) > 0))
	{
		$data['hphone']['value'] = (trim($_POST['hphone']));
		
		if(strlen($data['hphone']['value']) != 7)
		{
			$data['hphone']['errors'][] = 'Home Phone Should Be 7 Numbers.';
		}
		elseif(!is_numeric($data['hphone']['value']))
		{
			$data['hphone']['errors'][] = 'Home Phone Should Be Numeric Only.';
		}
	}
	if((isset($_POST['hphoneext'])) && (strlen($_POST['hphoneext']) > 0))
	{
		$data['hphoneext']['value'] = (trim($_POST['hphoneext']));
		
		if(strlen($data['hphoneext']['value']) > 5)
		{
			$data['hphoneext']['errors'][] = 'Home Phone Ext Should Be Less Than 5 Characters.';
		}
	}
	if((isset($_POST['mphonepre'])) && (strlen($_POST['mphonepre']) > 0))
	{
		$data['mphonepre']['value'] = (trim($_POST['mphonepre']));
		
		if(strlen($data['mphonepre']['value']) != 3)
		{
			$data['mphonepre']['errors'][] = 'Mobile Phone Prefix Should Be 3 Numbers.';
		}
		elseif(!is_numeric($data['mphonepre']['value']))
		{
			$data['mphonepre']['errors'][] = 'Mobile Phone Prefix Should Be Numeric Only.';
		}
	}
	if((isset($_POST['mphone'])) && (strlen($_POST['mphone']) > 0))
	{
		$data['mphone']['value'] = (trim($_POST['mphone']));
		
		if(strlen($data['mphone']['value']) != 7)
		{
			$data['mphone']['errors'][] = 'Mobile Phone Should Be 7 Numbers.';
		}
		elseif(!is_numeric($data['mphone']['value']))
		{
			$data['mphone']['errors'][] = 'Mobile Phone Should Be Numeric Only.';
		}
	}
	
	//FILE handling code inspired by examples provided by Adam Ogle
	if(isset($_FILES['file']))
    {
     	if($_FILES['file']['error'] == UPLOAD_ERR_NO_FILE)
     	{
     		$filedata = null;
     	}
     	elseif($_FILES['file']['error'] != UPLOAD_ERR_OK){
            $errors = array(
                UPLOAD_ERR_OK => 'Upload Successful!',
                UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
                UPLOAD_ERR_FORM_SIZE => 'File exceeds maximum file size specified.',
                UPLOAD_ERR_PARTIAL => 'Partial Upload.',
                UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
                UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
                UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.'
            );
            $data['file']['errors'][] = 'Missing file: ' . $errors[$_FILES['file']['error']];
        }
        else
        {
            $types = array('image/jpeg', 'image/png');
            if(!in_array($_FILES['file']['type'], $types)){
                $data['file']['errors'][] = 'File type must be an image';
            }
            else
            {
                $img_info = getimagesize($_FILES['file']['tmp_name']);
                if($img_info === false){
                    $data['file']['errors'][] = 'File type must be an image';
                }
                else
                {
                    if(!in_array($img_info['mime'], $types)){
                        $data['file']['errors'][] = 'File type must be an image';
                    }
                    else
                    {
                    	if($img_info['0'] > 500 || $img_info['1'] > 500)
						{
							$data['file']['errors'][] = 'Image is too large!';
						}
                        else
                        {
                        	$data['file']['file'] = $_FILES['file']['tmp_name'];
                        	$data['file']['mime'] = 'image/jpeg';
                        	
                        	$filedata = file_get_contents($data['file']['file']);
                        }
                    }
                }
            }
        }
    }
	    
  
	//Total Errors  
    $total_errors = 0;
    foreach($data as $field){
        $total_errors += count($field['errors']);
    }

   	//If No Errors, attempt update query
    if($total_errors < 1)
    {        
        $update = $db->prepare("update content set fname = :fname, minitial = :minitial, lname = :lname, email = :email, street = :street, street2 = :street2, apt = :apt, city = :city, state = :state, zip = :zip, hphonepre = :hphonepre, hphone = :hphone, hphoneext = :hphoneext, mphonepre = :mphonepre, mphone = :mphone
        	where id = :id");
        
        $imageupdate = $db->prepare("update content set image = :filedata where id = :id");
        
        try{
        	$update->execute(array(
        		'fname' => ($data['fname']['value']),
        		'minitial' => ($data['minitial']['value']),
        		'lname' => ($data['lname']['value']),
        		'email' => ($data['email']['value']),
        		'street' => ($data['street']['value']),
        		'street2' => ($data['street2']['value']),
        		'apt' => ($data['apt']['value']),
        		'city' => ($data['city']['value']),
        		'state' => ($data['state']['value']),
        		'zip' => ($data['zip']['value']),
        		'hphonepre' => ($data['hphonepre']['value']),
        		'hphone' => ($data['hphone']['value']),
        		'hphoneext' => ($data['hphoneext']['value']),
        		'mphonepre' => ($data['mphonepre']['value']),
        		'mphone' => ($data['mphone']['value']),
        		'id' => $_GET['d']));
        		
        	if(isset($_POST['delete']))
        	{
        		if($_POST['delete'] == true)
        		{
        			$imageupdate->execute(array(
        				'filedata' => null,
        				'id' => $_GET['d']));
        		}
        	}
        	
        	if(!is_null($filedata))
        	{
        		$imageupdate->execute(array(
        			'filedata' => $filedata,
        			'id' => $_GET['d']));
        	}
        		
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
			header("Location: view.php");
			exit();
		
        
    }
}

?>