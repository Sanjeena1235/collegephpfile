<?php

 $conn= mysqli_connect('localhost','root','','collegefinder') or die("Error in connection");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $user_id = $_GET['id'];
  $sql = "SELECT * FROM ioecollege WHERE id = $user_id";
      $result= mysqli_query($conn,$sql);
      
    if($result){
         $json= mysqli_fetch_assoc($result);
         header('Content-Type: application/json');
    	echo json_encode($json);
    }

    else{
 	$response ="failed to register";

	header('Content-Type: application/json');
 	echo json_encode($response);
 }

 mysqli_close($conn);
}

?>    	