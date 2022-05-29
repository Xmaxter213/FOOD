<?php 
	
	session_start();

	if(isset($_SESSION['userlogin']))
	{
		header("Location: ../Home Page/index.php");
	}
?>
<!DOCTYPE html>
<html>
    
<head>
<<<<<<< HEAD
=======
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <link rel="stylesheet" href="Style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
>>>>>>> 06087ed7f93af398c2bb94eb12e8bb7eda0a6410
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<style>
	body{
		height: 100vh;
	}

	.leftPic{
		position: relative;
		float: left;
		width: 35%;
		height: 100%;
		background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('photos/LoginPic.png');
		border-right: 5px solid black;
	}

	.leftPic img{
		position: absolute;
		margin-left: 15px;
		margin-top: 80px;
	}

	.container{
		float: left;
		width: 65%;
		height: 100%;
	}

	.d-flex{
		padding-top: 12%
	}

</style>

<body>

	<div class = "leftPic">
		<img src="photos/Logo.png" width = "500" height = "500" title="Logo" onclick="showImage('photos/LoginPic.jpg')" />
	</div>

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">

				<div class="d-flex justify-content-center form_container">
					<form>
					<h1>LOGIN</h1><br>
						<div class="input-group mb-3">
						
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" id="email" class="form-control input_user" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control input_pass" required>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="button" name="button" class="btn login_btn" id="login">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="../Register Page/Register.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="../Home Page/index.php">Go to Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function()
		{
			$('#login').click(function(e){
				var valid = this.form.checkValidity();

				if(valid)
				{

					var email = $('#email').val();
					var password = $('#password').val();

				}

				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'jslogin.php',
					data: {email: email, password: password},
					success: function(data)
					{
						alert(data);
						if($.trim(data) === "1")
						{
							setTimeout('window.location.href = "../Home Page/index.php"', 1000);
						}
					},
					error: function(data)
					{
						alert('There were errors while doing the operation.');
					}
				})
			})
		})
</script>

		

	

</body>
</html>
