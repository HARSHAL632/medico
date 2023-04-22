<?php include("header.php");
 
 ?>
 
 
 <?php include('config.php');?>
<!DOCTYPE html>


<html>
    <head>
       
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
 <body>

        <?php
        $id =$_GET['id'];
        
          $sql = "SELECT * FROM `update` WHERE ID=$id";
         $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
    
         $medicinename = $row['NAME'];
         $packing = $row['PACKING'];
         $generic = $row['GENERIC_NAME'];
         $supplier  = $row['SUPPLIER_NAME'];
         $files = $row['image'];
    
        ?>
          <div class="container" style="margin-left:17%;">
            <h1 class="text-white bg-dark text-center"></h1>
         <div class="font-weight-bold" >
        <form action="medicine_upload.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <lable for="user"> medicine name: </lable>
            <input type="text" name="medicine" id="medicine" disabled value="<?php echo $medicinename;?>" class="form-control">
        </div>
        <div class="form-group">
            <lable for="user"> packing quantity: </lable>
            <input type="text" name="packing" id="packing" disabled value="<?php echo $packing;?>" class="form-control">
        </div>
        <div class="form-group">
            <lable for="user"> generic name: </lable>
            <input type="text" name="generic" id="generic" disabled value="<?php echo $generic;?>" class="form-control">
        </div>
        <div class="form-group">
            <lable for="user"> supplier name: </lable>
            <input type="text" name="supplier" id="supplier" disabled value="<?php echo $supplier;?>" class="form-control">
        </div>
        <div class="form-group">
            <lable for="file">  </lable>
            <style>.circular--square {
  float: left;
  margin-left: 125px;
  margin-top: 10px;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  overflow: hidden;
  background-color: blue;
}
        </style>
            <img class="circular--square"   src="<?php echo $files;?>" height="100px" widht="100px">
        </div>
           
</form>   
</div>
</div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
<?php include("footer.php");?> 
</body>
</html>


