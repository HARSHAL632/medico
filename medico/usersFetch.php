<?php 
 require_once ('config.php');
  $sql="SELECT * FROM `users` where user_type=2 AND deleted=0";
 $result=mysqli_query($conn, $sql);
 $i=0; 
 $arr=array();
 $data=array();
 while($row=mysqli_fetch_assoc($result) ){ $i++; 
                $arr['sr']= $i ;
				$arr['name']=	$row['name'];
				$arr['email']=	 $row['email'] ;
				// if($row['status']==1){
				// 	$status="<button class='btn btn-primary' title='Click to active'>Activate</button>";
				// }
				// else{
				// 	$status="<button class='btn btn-danger' title='Click to deactive'>Deactivate</button>";
				// }
				$arr['status']=	 $status;
				$arr['action']='<a  class="btn btn-default" data-toggle="modal" data-target="#modal-default" onclick="deleteCall('. $row['id'] .');" href="#">Delete</a>';	
 $data[]=$arr;
 }
  //echo "<pre>";
// print_r($data);
 echo json_encode(array("data"=>$data));
 ?>
