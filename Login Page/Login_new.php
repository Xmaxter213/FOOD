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

	.container{
		padding-top: 8%;
	}

	label{
		float: left;
	}

</style>

<body>

	<div class = "leftPic">
		<img src="photos/Logo.png" width = "500" height = "500" title="Logo" onclick="showImage('photos/LoginPic.jpg')" />
	</div>

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">

				<div class="d-flex">
					<form>
					<h1>LOGIN</h1><br>
					<label class="form-label" for="email">Your Email</label>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" id="email" class="form-control input_user" required>
						</div>
						
						<label class="form-label mb-2" for="password">Your Password</label>
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
						<a href="#">Go to Home</a>
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
