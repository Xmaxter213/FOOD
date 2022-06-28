<?php
require_once('../config.php');

?>
<?php

if(isset($_POST)){

		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$username  = $_POST['username'];
		$email     = $_POST['email'];
		$password  = sha1($_POST['password']);
		$code = '';

		$email_check = "SELECT * FROM userTable WHERE email = ?";
		$stmtEmail = $db->prepare($email_check);
		$stmtEmail->execute([$email]);
		if($stmtEmail->rowCount() > 0)
		{
			echo 'Email that you have entered is already exist!';
		}
		else
		{
			$code = rand(999999, 111111);
			$sql = "INSERT INTO userTable (firstName,lastName,username,email,password,Code) VALUES(?,?,?,?,?,?)";
			$stmtinsert = $db->prepare($sql);
			$result = $stmtinsert->execute([$firstname,$lastname,$username, $email, $password, $code]);
			if($result)
			{
				$subject = "Email Verification Code";
	            $message = "Your verification code is $code";
	            $sender = "From: NatsuDragneelxd42069@gmail.com";
	            if(mail($email, $subject, $message, $sender))
	            {
	                $info = "We've sent a verification code to your email - $email";
	                echo 'Successfully saved.';
	            }
	            else
	            {
	                $errors['otp-error'] = "Failed while sending code!";
	            }	
			}
			else
			{
				echo 'There were erros while saving the data.';
			}
		}
}
else
{
	echo 'No data';
}
