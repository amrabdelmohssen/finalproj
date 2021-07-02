<?php 
require 'dbconnection.php';
require 'validation.php';
 $errorpassword = '';
 $erroremail = '';
     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
         
     
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    //validate email
    if(!empty($email))
    {
        $email= emailvalid($email);
        if(!$email){
            
            $erroremail = 'your email is incorrect';
            
        }
        
    }else{
        
        $erroremail = 'enter your email';
        
    }
    
    
    // validate password 
    
    if(!empty($password))
    {
        $password= passvalid($password);
        $password = sha1($password);
       
        if(!$password){
            
            $errorpassword = 'your password is incorrect';
            
        }
        
    }else{
        
        $errorpassword = 'enter your password';
        
    }
    
    //var_dump()
    
    
     
    if(strlen($errorpassword) > 0 || strlen($erroremail)  )
    {
//        foreach($error as $key => $value )
//        {
//            echo  $value."<br>";
//        }
        
        echo $errorpassword ;
        echo $erroremail;
    }else{


        
        $sql = "SELECT * FROM `user` WHERE password = '".$password."' AND email= '$email'";
        $result1 = mysqli_query($con,$sql); 
        if(mysqli_num_rows($result1) > 0 )
        { 
            header("location: disp.php");

        }
        else
        {
            echo 'The username or password are incorrect!';
        }
    }
      
    
    
    
    
    
    
}


    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>Login</h2>

  <form   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  enctype ="multipart/form-data">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  
       
</body>
</html>




