 <?php include("header.php");
   
 
 
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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
              <form action="profile_sub.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
				 <?php if(@$_SESSION['err']) 
				 { 
					echo $_SESSION['err']; 
					unset($_SESSION['err']);
			     }
			  ?>
				<div class="form-group">
                    <label for="exampleInputPassword1">User Name</label>
                    <input type="text" class="form-control" name="name" value="<?=$_SESSION['userName']?>" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="<?=$_SESSION['userEmail']?>" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img"  id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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