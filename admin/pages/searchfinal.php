<?php

 $conn= mysqli_connect('localhost','root','','minorproject') or die("Error in connection");




if(isset($_GET['name']) && isset($_GET['location']) && isset($_GET['hitno']) && isset($_GET['bias']))	{
	$name=$_GET['name'];
	$location=$_GET['location'];
	$hitno=$_GET['hitno'];
  $bias=$_GET['bias'];
 

   if($location=='' && $name=='' && $hitno=='' && $bias==''){
    $sql = "SELECT name,id FROM college";
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

  

     if ($location != '') $conditions[] = "location LIKE '$location%'";
     if ($name != '') $conditions[] = "name LIKE '$name%'";
     if($hitno =='high')$conditions[] = 'hitno=22 OR hitno>23';
     if($hitno=='medium') $conditions[]= 'hitno>9 AND hitno<21';
     if($hitno=='low') $conditions[]='hitno>0 AND hitno<51';
     if($bias =='high')$conditions[] = 'bias=100 OR bias>100';
     if($bias=='medium') $conditions[]= 'bias>50 AND bias<100';
     if($bias=='low') $conditions[]= 'bias>0 AND bias<51';
// all we need now is to concatenate array elements with " AND " glue
       $sql_cond = join(" AND ", $conditions);
        
         if ($sql_cond != ''){ 
         	$sql = "SELECT name,id FROM college WHERE $sql_cond";
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