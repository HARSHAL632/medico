<?php
include_once 'config.php';
$sql = "DELETE FROM `update` WHERE  ID='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
	header('location: medicine_upload.php');
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>