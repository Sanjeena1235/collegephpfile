<?php 
function upload($field,$upload_dir = '../uploads/')
{
  $imgFile = $_FILES[$field]['name'];
    $tmp_dir = $_FILES[$field]['tmp_name'];
  return['status'=>move_uploaded_file($tmp_dir,$upload_dir.$imgFile),
    'image' => $imgFile];
  }
//require_once($_SERVER['DOCUMENT_ROOT'] . '/androidfirstproject/assets/database/dbconfig.php');

//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting post data 
 $username = $_POST['username'];
 $password = $_POST['password'];
 $email = $_POST['email']; 
 $data = array_merge($_POST,['image' => upload('image')['image']]);
 



// Check if image file is a actual image or fake image

$conn= mysqli_connect('localhost','root','','pythonpro') or die("Error in connection");

  $sql = "SELECT * FROM userdata WHERE username='$username' OR email='$email'";

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
 $sql = "INSERT INTO userdata (username,password,email,image) VALUES('$username','$password','$email','$image')";
 
 //Trying to insert the values to db 
 $result=mysqli_query($conn,$sql);
  $response = array();  
 
 if($result){

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
 