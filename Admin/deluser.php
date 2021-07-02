<?php
require 'dbconnection.php';
require 'validation.php';




if($_SERVER['REQUEST_METHOD'] == 'GET'){
//validate if thr id is found or not and is numeric or not  
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  
    header("location:disp.php");
    
}




//validate if the id is found in database or not 
$id1 = $_GET['id']; 

$sql = "delete from user where id =".$id1;
$run = mysqli_query($con , $sql);

    if($run)
    {
        $_SESSION['del'] = 'delete successfully';
        header("location:disp.php");

    }else {
      $_SESSION['del'] = 'error in delete';
        header("location:disp.php");
   
    }
   
    

}


?>