<?

//User is already validated via cred.php; Get contact list for user
define('PAGE_SIZE', 10);
$userid = htmlspecialchars($user['id']);

//Sort and Pagination Code sampled from labs and examples provided by Adam Ogle
//Get count of contacts for specified user
$contact_count = $db->prepare('select count(*) from content where ref = :user');
$contact_count->execute(array('user' => $userid));
$contact_count = $contact_count->fetch();
$contact_count = $contact_count[0];

//Define Sort Options
$sort_options = array(
    'order by lname asc',
    'order by lname desc');
$sort_index = 0;

//Check to see if Sort option is set
if(isset($_GET['s'])){
    if(array_key_exists($_GET['s'], $sort_options)){
        $sort_index = $_GET['s'];
    }
}

$page = 0;
//Check to see if Page option is set
if(isset($_GET['p']))
{
    $p = filter_var($_GET['p'], FILTER_VALIDATE_INT);
    if($p !== false)
    {
        if($p >= 0  && $p < ceil($contact_count / PAGE_SIZE))
        {
            $page = $p;
        }
    }
}

$query_page = ($page * PAGE_SIZE);
$query_size = (PAGE_SIZE);

//Query Database for Contacts with set sort and pagination options
$query = <<< EOQ
select * from content
	where ref = $userid
    $sort_options[$sort_index]
    limit $query_page, $query_size
EOQ;
$statement = $db->query($query);
$count = $statement->rowCount();
?>

