
<?php include('config.php');?>


<?php
 $q1 = " SELECT * FROM `update` ";
 $querydisplay = mysqli_query($conn,$q1);
 $result_array = [];

if(mysqli_num_rows($querydisplay) > 0){

    foreach($querydisplay as $row)
    {
        array_push($result_array, $row);
    }
    header('content-type: application/json');
    echo json_encode($result_array);
}


?>
