<?php 


	include('config.php');
	if(@$_SESSION['userId'])
  
	 header('location:dashboard.php');
  
	$emailErr=  $passwordErr=$err="";
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
        if(empty($email)) {
		  $emailErr= "You must enter an email";
		}  
		if (empty($password)) {
		  $passwordErr= "You must enter an password";
		}
		if(empty($passwordErr) && empty($emailErr) ){
			 $sql="Select * from users where email='".$email."' and password='".md5($password)."' ";
			 $rs=mysqli_query($conn, $sql);
			 $rowcount=mysqli_num_rows($rs);
			if($rowcount){
				$row=mysqli_fetch_assoc($rs);
				$_SESSION['userId']=$row['id'];
				$_SESSION['userName']=$row['name'];
				$_SESSION['userEmail']=$row['email'];
				$_SESSION['userImage']=$row['image'];
				header('location:dashboard.php');
			}else{
				$err="Email & Password is invalid!";
			}
			
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Your Pharmacy </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<style>body {
  background-image: url("assets/images/prof.jpg");
 

  height: 50%;
  font-family: 'Numans', sans-serif;
}</style>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <style>.h1{
            font-family: "Lucida Console", "Courier New", monospace;

      }</style>
      <a href="#" class="h1"><b> Your </b>Pharmacy</a>
    </div>
    <div class="card-body">
      <!--<p class="login-box-msg">Sign in to start your session</p>-->

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control <?php if(!empty($emailErr)) echo "is-invalid"; ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password"  class="form-control <?php if(!empty($passwordErr)) echo "is-invalid"; ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" value="submit"class="btn btn-primary btn-block">Sign In</button>
     

       <div class="_container btn">
        
        <a type="button" class="login-with-google-btn" href="<?php echo $client->createAuthUrl(); ?>">
            Sign in with Google
        </a>
    </div>


          </div>
          <!-- /.col -->
        </div>
      </form>

     
     

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
