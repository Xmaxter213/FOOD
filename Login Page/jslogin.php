<?php
session_start();
require_once('../Connection/config.php');


$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM userTable WHERE email = ? AND password = ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$email, $password]);


if($result)
{
	if($stmtselect->rowCount() > 0)
	{
	$check_valid = "SELECT OTP FROM userTable WHERE email = ? AND password = ? LIMIT 1";
	$valid = $db->prepare($check_valid);
	$user_valid = $valid->execute([$email, $password]);

	$validity = $valid->fetch(PDO::FETCH_ASSOC);

		if(implode("", $validity) === '1')
		{
			$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
			$_SESSION['Validity'] = $validity;
			
			
				$sqlgetuser = "SELECT username FROM userTable WHERE email = ? AND password = ? LIMIT 1";
				$getuser = $db->prepare($sqlgetuser);
				$data = $getuser->execute([$email, $password ]);

				$user = $getuser->fetch(PDO::FETCH_ASSOC);

				$_SESSION['userlogin'] = $user;
		        	echo 'Successfully';

			
		}
		else
		{
			echo 'Account Not validated';
		}
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

		$sqlgetuserID = "SELECT userID FROM userTable WHERE email = ? AND password = ? LIMIT 1";
		$getuserID = $db->prepare($sqlgetuserID);
		$database = $getuserID->execute([$email, $password ]);

		$userID = $getuserID->fetch(PDO::FETCH_ASSOC);

		$_SESSION['userID'] = $userID;

		$sqlgetstatus = "SELECT status FROM userTable WHERE email = ? AND password = ? LIMIT 1";
        $getstatus = $db->prepare($sqlgetstatus);
        $sqlstatus = $getstatus->execute([$email, $password ]);

        $status = $getstatus->fetch(PDO::FETCH_ASSOC);

        $_SESSION['userStatus'] = $status;


		

		
