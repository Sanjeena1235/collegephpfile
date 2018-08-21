<?php   
      
$conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");

if(isset($_GET['college_id'])){
    $user_id=$_GET['college_id'];
    $sql = "SELECT username,image,review FROM review WHERE college_id=$user_id";  
           $result=mysqli_query($conn,$sql);
          $json_array = array(); 
         
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;
              
                
           }   
           echo json_encode($json_array);
           
           mysqli_close($conn);   
       }
 ?>  
  