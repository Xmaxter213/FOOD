<?php
require_once '../config.php';
 


?>
<!DOCTYPE html>
<html>
<head>
	<title>FOOD Registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100 bg-image"
			style="background-image: url(background.png);">
			<div class="mask d-flex align-items-center h-100 gradient-custom-3">
			  <div class="container h-100">
			    <div class="row d-flex justify-content-center align-items-center h-100">
			      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
			        <div class="card" style="border-radius: 15px;">
			          <div class="card-body p-5">
			            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

			            <form action = "Register.php" method="post" onSubmit = "return validateForm()">

			              <hr class="mb-3"><br>

			              <div class="d-flex justify-content-between">
							<div class="form-outline mb-4">
			                <input type="text" id="firstname" class="form-control form-control-lg" name="firstname" style="text-transform: capitalize;" required pattern="\S(.*\S)?[A-Za-z]" title="Must only contain letters without spaces and numbers."/>
			                <label class="form-label" for="firstname">First Name</label>
			              </div>
			              <div class="form-outline mb-4">
			                <input type="text" id="lastname" class="form-control form-control-lg" name="lastname" style="text-transform: capitalize;" required pattern="\S(.*\S)?[A-Za-z]" title="Must only contain letters without spaces and numbers."/>
			                <label class="form-label" for="lastname">Last Name</label>
			              </div>
						  </div>

			              <div class="form-outline mb-4">
							  
			                <input type="text" id="username" class="form-control form-control-lg" name="username" pattern ="\S(.*\S)?[A-Za-z0-9]+" title="Must only contain letters and numbers"/>
			                <label class="form-label" for="username">Username</label>
			              </div>

			              <div class="form-outline mb-4">
			                <input type="email" id="email" class="form-control form-control-lg" name="email" required/>
			                <label class="form-label" for="email">Your Email</label>
			              </div>

			              <div class="form-outline mb-4">
			                <input type="password" id="password" class="form-control form-control-lg" name="password" required pattern ="\S(.*\S)?[A-Za-z0-9]+.{6,}" title="Must contain at least one (1) number, one (1) letter, no space & special characters, and at least 8 or more characters">
			                <label class="form-label" for="password">Password</label>
			              </div>

			              <div class="form-outline mb-4">
			                <input type="password" id="re-password" class="form-control form-control-lg"  name="re-password" required pattern="\S(.*\S)?"/>
			                <label class="form-label" for="form3Example4cdg">Repeat your password</label>
			              </div>

			              <hr class="mb-3">

			              <div class="d-flex justify-content-center">
			                <input type="submit"
			                  class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" id="register" name="create" value="Register"></input>
			              </div>

			              <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="../Login Page/Login_new.php"
			                  class="fw-bold text-body"><u>Login here</u></a></p>

			            </form>

			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var password     = $('#password').val();
			var repassword   = $('#re-password').val();
			
			if(repassword == "")
			{
				return;
			}
			
			if(password.length != 0)
			{
				if(password == repassword)
				{
					var valid = this.form.checkValidity();
					if(valid)
					{
						var firstname = $('#firstname').val();
						var lastname  = $('#lastname').val();
						var username  = $('#username').val();
						var email     = $('#email').val();
						var password  = $('#password').val();

						e.preventDefault();	

						$.ajax({
							type: 'POST',
							url: 'process.php',
							data: {firstname: firstname, lastname: lastname, username: username, email: email, password: password},
							success: function(data){
								if(data === "Successfully saved.")
								{
									Swal.fire({
											'title': 'Successful',
											'text': data,
											'type': 'success'
											}).then(function(){
												window.location = "../OTP/OTP.php";
											});

								}
								else
								{
									Swal.fire({
											'title': 'Errors',
											'text': data,
											'type': 'error'
											})
								}

							},
							error: function(data){
								Swal.fire({
										'title': 'Errors',
										'text': 'There were errors while saving the data.',
										'type': 'error'
										})
							}
								
						});
					}
					else
					{

					}
				}
				else
				{
					Swal.fire({
										'title': 'Errors',
										'text': 'Password does not match',
										'type': 'error'
										})
				}

			}
		});		
	});
	
</script>
</body>
</html>