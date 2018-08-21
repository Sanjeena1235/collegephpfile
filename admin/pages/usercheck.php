<?php

 $conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");
if(isset($_GET['name']) && isset($_GET['password'])){
    $username=$_GET['name'];
     $password=$_GET['password'];

    $sql = "SELECT * FROM user WHERE name='$username' AND password='$password'";
     
    $result=mysqli_query($conn,$sql);

   if($result){
         $json["message"]= mysqli_fetch_assoc($result);
         header('Content-Type: application/json');
        echo json_encode($json);
     }
      
  else{
 	$response["message"]="failed to register";

	header('Content-Type: application/json');
 	echo json_encode($response);
 }

 mysqli_close($conn);
}

?>    	