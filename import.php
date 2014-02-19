<?php
	
	
	
	$db = new PDO(
	    'mysql:host=localhost;dbname=kraftd', 
	    'kraftd', 
	    '9973',
	    array(PDO::ATTR_PERSISTENT => true));
	
	$db->setAttribute(PDO::ATTR_ERRMODE,
	    PDO::ERRMODE_EXCEPTION);
	
?>
