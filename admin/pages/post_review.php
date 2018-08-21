<?php 


if($_SERVER['REQUEST_METHOD']=='POST'){
 $collegeid = $_POST['college_id'];
 $userid = $_POST['user_id'];
  $username = $_POST['username']; 
  $review=$_POST['review'];
$conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");
   if ($_FILES["image"]["name"]!="") {
    		$temp = explode(".",$_FILES["image"]["name"]);
    		$filename = "image_".round(microtime(true)).'.'. end($temp);
    		$target_dir = "../post_image/";
			$target_file = $target_dir . basename($filename);
			
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	       
		    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
           $result="INSERT INTO student (college_id,username,image,review,user_id) VALUES('$collegeid','$username','$filename','$review','$userid')";
           $sqql="INSERT INTO flag(value) VALUES ('1')";
           

		    if(mysqli_query($conn,$result)) {
		        $response["success"]=1;
                $response["message"]="successfully post your review";
                header('Content-Type: application/json');
               // echo json_encode($response);
                echo json_encode($response);
                 } 
		       else {
 	             $response["success"]=10;
 	             $response["message"]="failed to post your review";

	             header('Content-Type: application/json');
 	             echo json_encode($response);
                 } 
              }
  else{
                  $response["success"]=11;
                 $response["message"]="sorry,failed to post your review";

                 header('Content-Type: application/json');
                 echo json_encode($response);
       }
   
 mysqli_close($conn);

}
else{
     $response["success"]=12;
                 $response["message"]="your system has been fail";

                 header('Content-Type: application/json');
                 echo json_encode($response);
}


?>