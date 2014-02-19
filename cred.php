<? require_once('import.php');

//Validate User
session_start();

if(!isset($_SESSION['prometheus'])){
    header('Location: index.php');
    exit();
}

$statement = $db->prepare('select * from credentials where id = ?');
$statement->execute(array($_SESSION['prometheus']));
$user = $statement->fetch();

if($user === false){
    header('Location: logout.php');
    exit();
}

?>