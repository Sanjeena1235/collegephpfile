<?php 


if($_SERVER['REQUEST_METHOD']=='POST'){
 $collegeid=$_POST['college_id'];
 $userid=$_POST['user_id'];
  $username=$_POST['username']; 
  $review=$_POST['review'];
  $filename=$_POST['image'];
$conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");
  
    	
           $result="INSERT INTO review (college_id,username,image,review,user_id) VALUES('$collegeid','$username','$filename','$review','$userid')";
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
             
 
   
 mysqli_close($conn);

}
else{
     $response["success"]=12;
                 $response["message"]="your system has been fail";

                 header('Content-Type: application/json');
                 echo json_encode($response);
}


?>