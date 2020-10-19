
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>OON APP</title>

  
  <!-- Custom styles for this template-->
  <link href="cssindex/cssindex.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center><b>LOGIN</b></center></div>
      <div class="card-body">
        <form  method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Enter User Name" required="required" autofocus="autofocus">
              <label for="useridoon">User Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="passoon">Password</label>
            </div>
          </div>
          <div class="form-group">
           
          </div>
          <!--div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div-->
          <!--a class="btn btn-primary btn-block" href="index.php" name="loginoon">Login</a-->
          <button type="button" class="btn btn-primary btn-block" onclick="login()" name="loginoon">Login</button>
        </form>
        <!--div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div-->
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!--script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script-->

  <!-- Core plugin JavaScript-->
  <!--script src="vendor/jquery-easing/jquery.easing.min.js"></script-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>
<script type="text/javascript">
  function login(){
   
      var username     = $('#username').val();
      var password = $('#password').val();
  
      $.ajax({
           type: 'POST',
   
           url: "localhost:3000/auth/myadmin",
   
   
   
           data: {username:username,password:password},
   
   
           success: function (data) {
   
                if(data.status =="1"){
                 
                       window.location.href='dashboard.php';
                 
                     }
                     
                 else{
   
                  alert('Failed');
                 }
   
           }
       });
    
    
    
   }
</script>