 <?php include("header.php");
 
 ?>
 <?php
// require 'config.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
// if(session_status() !==session_status_active()){
//   session_start();
// }
?>
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
           
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              
                <p>Total medicine</p>
                <?php
                $query = "SELECT * FROM `update`";
             
               $query_run = mysqli_query($conn, $query);
            
               $row = mysqli_num_rows( $query_run);
               echo '<h1>'.$row.'</h1>';

                ?>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="medicine_upload.php" class="small-box-footer">details<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-success">
              <div class="inner">
              
                <p>Total customers</p>
                <?php
                $query = "SELECT * FROM `customers`";
             
               $query_run = mysqli_query($conn, $query);
            
               $row = mysqli_num_rows( $query_run);
               echo '<h1>'.$row.'</h1>';

                ?>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="manage_customer.php" class="small-box-footer">details<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
    <!-- Main content -->
 
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php");?>
