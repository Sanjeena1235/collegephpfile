<?php

 $conn= mysqli_connect('localhost','root','','collegefinder') or die("Error in connection");




if(isset($_GET['location']) && isset($_GET['list_of_college']) && isset($_GET['fee']))	{
	$location=$_GET['location'];
	$collegename=$_GET['list_of_college'];
	$fee=$_GET['fee'];

   if($location=='' && $collegename=='' && $fee==''){
    $sql = "SELECT list_of_college FROM collegelist";
    $result= mysqli_query($conn,$sql);
     
       if($result){
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
               $rows[] = $r;
               }
            header('Content-Type: application/json');
               echo json_encode($rows);
            
             
    	   
    	 
    }
}
    

    else{


     $conditions = array();

  
// adding condition to array for every parameter <> 0
     if ($location != '') $conditions[] = "location LIKE '$location%'";
     if ($collegename != '') $conditions[] = "list_of_college LIKE '$collegename%'";
     if ($fee != '') $conditions[] = "fee LIKE '$fee%'";

// all we need now is to concatenate array elements with " AND " glue
       $sql_cond = join(" AND ", $conditions);
        
         if ($sql_cond != ''){ 
         	$sql = "SELECT list_of_college FROM collegelist WHERE $sql_cond";
            $result= mysqli_query($conn,$sql);
      
            if($result){
              $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
               $rows[] = $r;
               }
            header('Content-Type: application/json');
               echo json_encode($rows);
            
             
    }
}
        
    }
}
?>