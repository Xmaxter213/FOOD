<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" id="code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit" id="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){

        $('#Submit').click(function(e){
            var valid = this.form.checkValidity();

            if(valid)
            {
                var code = $('#code').val();

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'jsOTP.php',
                    data: {code : code},
                    success: function(data){
                        if(data === "Successfull")
                        {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                                }).then(function(){
                                    window.location = "../Login Page/login_new.php";
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

            
        });
    });



</script>

</body>
</html>