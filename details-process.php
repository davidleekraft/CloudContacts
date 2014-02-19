<? 

//Ensure contact id given
if(!isset($_GET['d']))
{
	header('Location: view.php');
	exit();
}

$id = $user['id'];

//Query Info About Contact
$statement = $db->prepare('select * from content where id = :d_value and ref = :id');
$statement->execute(array('d_value' => $_GET['d'], 'id' => $id));
$contact = $statement->fetch();

//If Contact Does Not Exist, redirect
if($contact == false)
{
	header('Location: view.php');
	exit();
}

?>