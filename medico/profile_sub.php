<?php
include("config.php");
 $emailErr=  $nameErr=$err="";
 //print_r($_REQUEST);
 print_r($_FILES); //die;
	if(isset($_REQUEST['submit'])){
		$email = $_POST['email'];
		$name = $_POST['name'];
        if(empty($email)) {
		  $emailErr= "You must enter an email";
		  $_SESSION['emailErr']=$emailErr;
		} 
		else{
			$sql="SELECT * FROM users where email='".$email."'";
			 $checkrs=mysqli_query($conn, $sql);
			 $checkrow=mysqli_fetch_assoc($checkrs);
			 if($checkrow['id']!=$_SESSION['userId']){
				 $err="Email already exist!";
				 $_SESSION['err']=$err;
			 }
		}	
		if (empty($name)) {
		  $nameErr= "You must enter an name";
		  $_SESSION['nameErr']=$nameErr;
		}
		$image_name="";
		if(empty($nameErr) && empty($emailErr) && empty($err)){
			
			/**********************/
			if(isset($_FILES['img'])) {
				$errors     = array();
				$maxsize    = 2097152;
				$acceptable = array(
					
					'image/jpeg',
					'image/jpg',
					'image/gif',
					'image/png'
				);

				/* if(($_FILES['uploaded_file']['size'] >= $maxsize) || ($_FILES["uploaded_file"]["size"] == 0)) {
					$errors[] = 'File too large. File must be less than 2 megabytes.';
				} */

				if(!in_array($_FILES['img']['type'], $acceptable) && (!empty($_FILES["img"]["type"]))) {
					$_SESSION['err']=$errors[] = 'Invalid file type. Only  JPG, GIF and PNG types are accepted.';
					header('location:profile.php');
				}

				if(count($errors) === 0 && !empty($_FILES['img']['name'])) {
					$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
					$image_name=$filename=time().".".$ext;
					$uploaddir = 'C:/xampp/htdocs/medico/assets/school/'.$filename;
					
					move_uploaded_file($_FILES['img']['tmp_name'], $uploaddir); 
					if(@$_SESSION['userImage']){
						echo $oldimg = 'C:/xampp/htdocs/medico/assets/school/'.$_SESSION['userImage'];
						if(unlink($oldimg)) echo "delete";
						//die;
					}
				} 	
			}
			/**********************/
			
			
			
			$update="UPDATE `users` SET `name`='".$_REQUEST['name']."',`email`='".$_REQUEST['email']."',image='".$image_name."' WHERE id='".$_SESSION['userId']."'";
			mysqli_query($conn, $update);
			$_SESSION['userName']=$_REQUEST['name'];
				$_SESSION['userEmail']=$_REQUEST['email'];
				$_SESSION['userImage']=$image_name;
		}
		header('location:profile.php');
	}
?>