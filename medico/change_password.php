 <?php include("header.php");
 $oldErr=  $newErr=$err="";
   if(isset($_REQUEST['submit'])){
		$oldpass = md5($_POST['oldpass']);
		$newpass = $_POST['newpass'];
		$confirmpass = $_POST['confirmpass'];
		
        if(empty($oldpass)) {
		  $oldErr= "You must enter an Old Password";
		  
		} 
		else{
			 $sql="SELECT * FROM users where id='".$_SESSION['userId']."' and password='".$oldpass."'";
			 $checkrs=mysqli_query($conn, $sql);
			 $rowcount=mysqli_num_rows($checkrs);
			
			 if(!$rowcount){
				 $err="Please enter correct password!";
				 
			 }
			 else{
				 if(empty($newpass)) {
					$err= "You must enter an New Password";
					} 
				 else if(empty($confirmpass)) {
					$err= "You must enter an Confirm Password";
					}
				 else if($confirmpass!=$newpass)	{
					$err= " Confirm Password did not match!";
				    }
				 else{
					
					$update="UPDATE `users` SET `password`='".md5($confirmpass)."',`password_txt`='".$confirmpass."' WHERE id='".$_SESSION['userId']."'";
					mysqli_query($conn, $update);
					
				}
				 
			 }
		}	
   }	
 
 
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

         
        </div>
        <div class="card-body">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
			 
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
				 <?php if(@$err) 
				 { 
					echo $err; 
					
			     }
			  ?>
				<div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="password" class="form-control" name="oldpass"  id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" class="form-control" name="newpass"  id="exampleInputEmail1" placeholder="Enter New Password">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Confirm Password</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="password" class="form-control" name="confirmpass"  id="exampleInputFile" placeholder="Confirm Password">
                       
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <?php include("footer.php");?>