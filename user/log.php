<?php 
require '../dbconnection.php';
require '../validation.php';
 $errorpassword = '';
 $erroremail = '';

//  if($_SERVER['REQUEST_METHOD'] == 'GET'){
//     //validate if thr id is found or not and is numeric or not  
//     if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
      
//         header("location:index.php?id=".$id);
        
//     }
    
    
    
    
    //validate if the id is found in database or not 

    // $id1 = $_GET['id'];  
    // $sql = "select * from user where id =".$id1;
    // $run = mysqli_query($con , $sql);
    // $check = mysqli_num_rows($run);
    //     if($check == 0)
    //     {
    //         header("location:index.php?id=".$id);
    
    //     }
    //     else
    //     {
    //         $data = mysqli_fetch_assoc($run);
    //     }
    
        
    
    // }
    
    



     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
         
     
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

    
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

        echo $errorpassword ;
        echo $erroremail;
    }else{


        
        $sql = "SELECT * FROM `user` WHERE password = '".$password."' AND email= '$email'";
        $result1 = mysqli_query($con,$sql); 
        if(mysqli_num_rows($result1) > 0 ){
        $data = mysqli_fetch_assoc($result1);
        $idU = $data['id'];
        
            header("location: index.php?id=".$idU);

        }
        else
        {
            echo 'username or password are incorrect!';
        }
    }
     
    
    
    
    
    
}
    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="../admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form  action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  enctype ="multipart/form-data">

                                        <input type="hidden" name="id"  value="<?php echo $data['id'];?>">

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name = 'email'/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name = "password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary" style="margin: auto;">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
