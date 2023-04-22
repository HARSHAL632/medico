<?php include("header.php");
 
 ?>
 
 
 <?php include('config.php');?>
<!DOCTYPE html>


<html>
    <head>
        <title>

        </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <link rel="shortcut icon" href="" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
     <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css"> 
     <script src="js/validateForm.js"></script> 
     <script src="js/restrict.js"></script> 
</head>
 <body> 
     <div style="margin-left:17%;">
          <div class="container" >
            <h1 class="text-white bg-dark text-center"></h1>
         <div class="font-weight-bold" >
        <form action="medicine_upload.php" method="post" enctype="multipart/form-data">
       
        <div class="form-group">
            <lable for="user"> medicine name: </lable>
            <input type="text" name="medicine" id="medicine" class="form-control">
        </div>
        <div class="form-group">
            <lable for="user"> packing quantity: </lable>
            <input type="text" name="packing" id="packing" class="form-control">
        </div>
        <div class="form-group">
            <lable for="user"> generic name: </lable>
            <input type="text" name="generic" id="generic" class="form-control">
        </div>
        <div class="form-group">
            <lable for="user"> supplier name: </lable>
            <input type="text" name="supplier" id="supplier" class="form-control">
        </div>
        <div class="form-group">
            <lable for="file"> medicine image: </lable>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <input type="submit" name="submit" value="submit" class="btn btn-outline-primary">
        <a class="btn btn-outline-primary" href="medicine_upload.php">view  list</a>

        </form>
</div>
</div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
<?php include("footer.php");?> 
</body>
</html>