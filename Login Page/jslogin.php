<?php
session_start();
require_once('../config.php');


$email = $_POST['email'];
$password = sha1($_POST['password']);


$sql = "SELECT * FROM userTable WHERE email = ? AND password = ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$email, $password]);

if($result)
{
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0)
	{
		
		$_SESSION['userlogin'] = $user;
		echo '1';
	}
	else
	{
		echo 'Invalid Email or Password';
	}
}
else
{
	echo 'There was an error connecting to the database';
}

