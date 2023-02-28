<?php
    require_once("./entities/users.class.php"); // Import entities classs users 
	include_once("./session.php");
    $users = User::list_admin();
    
?>