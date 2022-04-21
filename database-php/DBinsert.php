<?php

include 'DBconnect.php';
function register($fname,$lname,$username,$password)
{
 $conn=connect();
$sql= $conn->prepare("INSERT INTO user(fname,lname,username,password) VALUES(?,?,?,?)");
$sql->bind_param("ssss",$fname,$lname,$username,$password);
$response=$sql->execute();
$conn->close();
return $response;

}

?>