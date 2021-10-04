<?php 
  if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $pass1=$password;
    if(!empty($email) && !empty($password)){
      if(is_dir("users/$email")){
          $fo=fopen("users/$email/details.txt","r");
          fgets($fo);
          $pass=trim(fgets($fo));
          $password=substr(sha1($password),0,10);
          if($pass==$password){
            session_start();
            $_SESSION['sid']=$email;
            if(!empty($_POST['remember'])){
              setcookie('email',$email,time()+3600*24);
              setcookie('password',$pass1,time()+3600*24);
            }
            header("location:dashboard.php");
          }
          else {
            $errMsg="Enter correct email or password";
          }
      }
      else{
        $errMsg="Enter correct email or password";
      }
    }
    else {
      $errMsg="Plz fill the blank fields";
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login Page</title>
    <script>
      function cook(){
          if("<?php echo $_COOKIE['email'];?>"!=undefined){
            if(document.getElementById("email").value=="<?php echo $_COOKIE['email'];?>"){
              document.getElementById("password").value="<?php echo $_COOKIE['password'];?>" ;
            }
            else {
              document.getElementById("password").value="" ;
            }
          }
      }
    </script>
    <style>
        .container{
            background-color:#0001;
        
        }

        .form-box .btn-facebook{
    background: #4866a8;
}

.form-box .btn-google{
    background: #da3f34;
}

.form-box .btn-twitter{
    background: #33ccff;
}

.form-box .btn-facebook:hover{
    background: #3d5785;
    color: #fff;
}

.form-box .btn-google:hover{
    background: #bf3b31;
    color: #fff;
}

.form-box .btn-twitter:hover{
    background: #2eb7e5;
    color: #fff;
}
.image-container{
    background: url('image/pancake.jpg') center no-repeat;
    background-size: cover;
    height: 100vh;
}

.form-container{
    background-color: #fccc00;
    display: flex;
    justify-content: center;
}
 
</style>
  </head>
  <body>
  <div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>

			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mb-3">
						<img src="image/slice.jpg" width="60px">
				
    <main>
    <div class="heading mb-4">
		<h4>Login into your account</h4>
	</div>
        <section class="container">
        <?php 
          if(!empty($errMsg)){
            ?>
      <div class="alert alert-danger"> <?php echo $errMsg;?></div>
            <?php
          }
          ?>
        <form method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" onchange="cook()">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" name="login" class="text-left mb-3">Submit</button>
   <!-- <div class="text-center mb-2">
							<div class="mb-3" style="color: #777">or login with</div>

							<a href="" class="btn btn-social btn-facebook">facebook</a>

							<a href="" class="btn btn-social btn-google">google</a>

							<a href="" class="btn btn-social btn-twitter">twitter</a>
						</div>  -->
                        <div style="color: #777">Don't have an account?
							<a href="registration.php" class="register-link">Register here</a>
						</div>
 
   
</form>
        </section>
    </main>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>