<?php 


if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting post data 
 $username = $_POST['name'];
 $password = $_POST['password'];
 $email = $_POST['email']; 
 $usertype=$_POST['user_type'];
 $address=$_POST['address'];
 



$conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");

  $sql = "SELECT * FROM `user` WHERE name='$username' OR email='$email'";

   $check = mysqli_query($conn,$sql);

    if(mysqli_num_rows($check)){
 //If check has some value that means username already exist 
	$json["success"]=0;
	 $json["message"]="username or email already exist";
		header('Content-Type: application/json');
    	echo json_encode($json);

 }else{ 
 
$temp = explode(".",$_FILES["image"]["name"]);
      $filename = "image_".round(microtime(true)).'.'. end($temp);
      $target_dir = "../uploads/";
    $target_file = $target_dir . basename($filename);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 


move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
$result="INSERT INTO user (name,password,email,user_type,address,image) VALUES('$username','$password','$email','$usertype','$address','$filename')"; 
 
 if(mysqli_query($conn,$result)){
  $response["success"]=1;
  $response["message"]="successfully registered";
   header('Content-Type: application/json');
  echo json_encode($response);
 }
  
 
else{
 	$response["success"]=10;
 	$response["message"]="failed to register";

	header('Content-Type: application/json');
 	echo json_encode($response);
 }

 mysqli_close($conn);
}
 }
?>
 