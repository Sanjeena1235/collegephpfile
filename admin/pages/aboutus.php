
<?php   
      //  mysqli_set_charset("utf8"); 
    //header('Content-Type: text/html; charset=utf-8');    
      $conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");
//if(isset($_GET['college_id'])){
  //  $user_id=$_GET['college_id'];
    $sql = "SELECT * FROM information";  
           $result=mysqli_query($conn,$sql);
          $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
           /*echo '<pre>';  
           print_r(json_encode($jsoan_array));  
           echo '</pre>';*/
         //  json_encode($json_array,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);  
           echo json_encode($json_array);
          // echo utf8_encode(json_encode($json_array));
           mysqli_close($conn);   
       
 ?>  
  