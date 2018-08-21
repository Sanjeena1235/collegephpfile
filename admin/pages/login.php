<?php 
//require_once($_SERVER['DOCUMENT_ROOT'] . '/androidfirstproject/assets/database/dbconfig.php');

//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting post data 
 $email = $_POST['email'];
 $password = $_POST['password'];
$conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");
$sql="SELECT * FROM user WHERE email='$email' AND password='$password' ";
 if(mysqli_num_rows(mysqli_query($conn,$sql))){
  $response["success"]=1;
  $response["message"]="successfully login";
  header('Content-Type: application/json');
  echo json_encode($response);
 }
  
 else{
 	$response["success"]=0;
 	$response["message"]="failed to login";

	header('Content-Type: application/json');
 	echo json_encode($response);
 }

 mysqli_close($conn);
}
 
?>