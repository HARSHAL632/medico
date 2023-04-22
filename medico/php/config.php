<?php  
$host = 'localhost';  
$user = 'root';  
$pass = ''; 
$dbname="school_db"; 
//$conn = mysqli_connect($host, $user, $pass);
$conn=mysqli_connect($host,$user,$pass,$dbname);
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if(!$conn )  
{  
  echo ('Could not connect: ' . mysqli_connect_error());  
}  
//echo 'Connected successfully';  
//mysqli_close($conn);  
?>  