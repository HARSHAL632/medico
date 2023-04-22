<?php include("header.php");
 
 ?>
<?php include('config.php');?>
<head>
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<div class="container" style="margin-left:17%;">
    <h1 class="text-center text-white bg-dark"></h1>
    <br>
    <div class="table-responsive">
    <table class="table table-border table-striped table-hover" id="example">
        <thead>
            <th> Id </th>
            <th> Medicine </th>
            <th> Packing </th>
            <th> Generic </th>
            <th> Supplier </th>
            <th> Madicine image</th>
            <th> Delete</th>
            <th> View</th>
            <th> Edit</th>
        </thead>
        <tbody class="medic">
</tbody>

        <?php
        $conn = mysqli_connect('localhost','root');
        mysqli_select_db($conn,'school_db');

        if(isset($_POST['submit'])){
            
            $medicinename = $_POST['medicine'];
            $packing = $_POST['packing'];
            $generic = $_POST['generic'];
            $supplier  = $_POST['supplier'];
            $files = $_FILES['file'];

            // print_r($_POST);
            // die();
            // echo "<br>";
            // print_r($files);

            $filename = $files['name'];
            $fileerror = $files['error'];
            $filetemp = $files['tmp_name'];
            $fileext = explode('.',$filename);
            $filecheck = strtolower(end($fileext));
            $fileextstored = array('png', 'jpg', 'jpeg');
            if(in_array($filecheck,$fileextstored)){
                $destinationfile='images/'.$filename;
                move_uploaded_file($filetemp,$destinationfile);

                $q = "INSERT INTO `update`(`NAME`,`PACKING`, `GENERIC_NAME`, `SUPPLIER_NAME`, `image`) VALUES ('$medicinename','$packing', '$generic', '$supplier','$destinationfile')";

                $query = mysqli_query($conn,$q);
                
               
            }
        }
        $q1 = " SELECT * FROM `update` ";
        $querydisplay = mysqli_query($conn,$q1);

        // $row = mysqli_num_rows($querydisplay);

        // while( $result = mysqli_fetch_array($querydisplay)){
        //     ?>
           

        <?php
        // }
        ?>

<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>$(document).ready(function () {
     
           getdata();
        // $('#example').DataTable()
    });
    function getdata(){
        $.ajax({
           type: "GET",
           url: "fetch.php",
           success: function(data){
            // console.log(data);
            $.each(data, function (key,value){
                console.log(value);
                $('.medic').append( '<tr>'+   
                   '<td>'+value.ID+'</td>\
                   <td>'+value.NAME+'</td>\
                   <td>'+value.PACKING+'</td>\
                   <td>'+value.GENERIC_NAME+'</td>\
                   <td>'+value.SUPPLIER_NAME+'</td>\
                   <td><img src="'+value.image+'" height="50px" widht="50px"></td>\
                   <td><button type="button" class="btn btn-danger"><a href="delete.php?userid='+value.ID+'">Delete</a></button></td>\
                   <td><button type="button" class="btn btn-info"><a href="view.php?id='+value.ID+'">view</a></button></td>\
                   <td><button type="button" class="btn btn-info"><a href="edit.php?id='+value.ID+'">Edit</a></button></td>\
            </tr>'
            
             );
             })
           }
        
})};</script>


</table>
</div>
</div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
<?php include("footer.php");?>

 