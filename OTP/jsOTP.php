<?php 
require_once('../config.php');

$code = $_POST['code'];

$getCode = "SELECT * FROM userTable WHERE code = ?";
$stmtGetCode = $db->prepare($getCode);
$stmtGetCode->execute([$code]);

if($stmtGetCode->rowCount() > 0)
{
	$updateStatus = "UPDATE userTable SET OTP = '1' WHERE code = ?";
	$stmtStatus = $db->prepare($updateStatus);
	$stmtStatus->execute([$code]);
	echo 'Successfull';
}
else
{
	echo 'Invali Code! Please enter valid code';
}