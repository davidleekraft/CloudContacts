<?

//Assume User has already been validated via cred.php; display user name and logout
echo "Welcome " . htmlspecialchars($user['fname']) . "! | ";
echo '<a href="logout.php">Logout</a><hr />';


?>