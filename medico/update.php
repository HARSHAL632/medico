<?php include('config.php');?>

<?php
$id = $_POST['id'];
$medicinename = $_POST['medicine'];
$packing = $_POST['packing'];
$generic = $_POST['generic'];
$supplier  = $_POST['supplier'];
$files = $_FILES['file'];
$old_files = $_POST['old_img'];
$destinationfile='';
if(!empty($_FILES['file']['name'])){
// echo "files";
// die();

$filename = $files['name'];
$fileerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.',$filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png', 'jpg', 'jpeg');

if(in_array($filecheck,$fileextstored)){
    $destinationfile='images/'.$filename;
    move_uploaded_file($filetemp,$destinationfile);}}
else{
  $destinationfile = $old_files;
  

}

 $sql="UPDATE `update` SET `NAME`='$medicinename',`PACKING`='$packing',`GENERIC_NAME`='$generic',`SUPPLIER_NAME`='$supplier',`image`='$destinationfile' WHERE ID = $id";


   $update = mysqli_query($conn,$sql);

    if($update){
      //  if(!empty($_FILES['file']['name'])){
        // $fileext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
				// 	$image_name=$filename=time().".".$ext;
      //      move_uploaded_file($filetemp,$destinationfile);
      //      unlink("images/".$old_files);
      //  }
      header('location: medicine_upload.php');
    }

?>