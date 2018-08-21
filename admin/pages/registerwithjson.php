<?php 
//require_once($_SERVER['DOCUMENT_ROOT'] . '/androidfirstproject/assets/database/dbconfig.php');

//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting post data 
 $username = $_POST['username'];
 $password = $_POST['password'];
 $email = $_POST['email'];

 $conn= mysqli_connect('localhost','root','','practice') or die("Error in connection");

  $sql = "SELECT * FROM register WHERE username='$username' OR email='$email'";

   $check = mysqli_query($conn,$sql);

    if(mysqli_num_rows($check)){
 //If check has some value that means username already exist 
	$json["success"]=0;
	 $json["message"]="username or email already exist";

		header('Content-Type: application/json');
    	echo json_encode($json);

 }else{ 
 //If username is not already exist 
 //Creating insert query 
 $sql = "INSERT INTO register (username,password,email) VALUES('$username','$password','$email')";
 
 //Trying to insert the values to db 
 $result=mysqli_query($conn,$sql);
  $response = array();  
 
 if($sql){
 	$response["success"]=1;
 	$response["message"]="successfully registered";

	header('Content-Type: application/json');
 	echo json_encode($response);
 }

 //If inserted successfully 
 else{
 	$response["success"]=01;
 	$response["message"]="failed to register";

	header('Content-Type: application/json');
 	echo json_encode($response);
 }

 mysqli_close($conn);
}
}


?>
 
 