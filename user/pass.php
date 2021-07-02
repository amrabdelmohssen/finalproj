<?php 

require '../dbconnection.php';
require '../validation.php';



$massege = '';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
//validate if thr id is found or not and is numeric or not  
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  
    header("location:index.php");
    
}





//validate if the id is found in database or not 
$id = $_GET['id'];   
   
$sql = "select * from user where id =".$id;
$run = mysqli_query($con , $sql);
    
$check = mysqli_num_rows($run);
   
    if($check == 0)
    {
        header("location:index.php?id=".$id);

    }
    else
    {
        $data = mysqli_fetch_assoc($run);
    }

    

}







if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $password = clean($_POST['password']);
    $newpassword = clean($_POST['newpassword']);
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
  
if(!empty($password)){
                $password = passvalid($password);
                $password = sha1($password);
              
      
                        if($password){
                            $sqlp = "select * from `user`  where password = '$password'"; 
                            $run = mysqli_query($con,$sqlp);
                            $op = mysqli_num_rows($run);
                            
                            if($op > 1)
                            {
                                if(!empty($newpassword)){
                                $newpassword = passvalid($newpassword);
                                $newpassword = sha1($newpassword);


                                        if($newpassword){
                                            $sqlnp = "UPDATE `user` set `password` = '$newpassword' where admin_id=".$id; 
                                            $run = mysqli_query($con,$sqlnp);


                                        }
                                    else{
                                        $massege ='new password must be greater than 6 chars';
                                    }
                                
                                }else{
                                    $massege ='enter new password ';
                                }

                                
                            }else{
                                    $massege ='password is wrong!!';
                                }
                        }
                
                
                
                    else{
                             $massege ='password must be greater than 6 chars';
                    }

            
               
            }
            else {
                         $massege ='enter password';

            }
    
    
            if(strlen($massege) > 1 )
            {    
                $_SESSION["error"] = $massege;
                
                 header("Location: pass.php?id=".$id); 

            }else {
                
                $_SESSION["pass"] = 'Password updated successfully';
                header("location:index.php?id=".$id);

                
            }
                


                


            }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edite</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php     if(isset($_SESSION['error'])){
           echo $_SESSION['error'];
         //  unset($_SESSION['error']);
}
?>
<div class="container">
  <h2>Change Password</h2>

  <form   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="POST"  enctype ="multipart/form-data">
 
 
  <div class="form-group">
    <label for="exampleInputPassword1"> Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">  
  </div>
    <input type="hidden" name="id"  value="<?php echo $data['id'];?>">
 


  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
    
</div>
                     

       
</body>
</html>