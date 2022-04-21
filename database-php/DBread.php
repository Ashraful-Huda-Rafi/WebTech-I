<?php

include 'DBconnect.php';
function login($username,$password)

{
	$conn=connect();
	$sql = $conn->prepare("SELECT * FROM users WHERE username =? and password =?");
	$sql -> bind_param("ss",$username,$password);
	$sql->execute();
	$records= $sql->get_result();
	return $records->num_rows === 1;
	
 
}