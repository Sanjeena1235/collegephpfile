<?php 
//require_once($_SERVER['DOCUMENT_ROOT'] . '/androidfirstproject/assets/database/dbconfig.php');

//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting post data 
 $hitno = $_POST['hitno'];
 $collegeid = $_POST['id'];
$conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");
$sql="UPDATE college SET hitno=hitno+'$hitno' WHERE id=$collegeid ";
$sqql="INSERT INTO flag(value) VALUES ('1')";
 if(mysqli_query($conn,$sql)){
  $response["success"]=1;
  $response["message"]="interested";
  header('Content-Type: application/json');
  echo json_encode($response);
 }
  
 else{
 	$response["success"]=0;
 	$response["message"]="failed to hit";

	header('Content-Type: application/json');
 	echo json_encode($response);
 }

 mysqli_close($conn);
}
 
?>