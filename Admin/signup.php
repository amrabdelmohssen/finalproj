<?php
include'dbconnection.php';
include'validation.php';
$name = $email = $password = $age = '';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $name     = clean($_POST['name']);
    $email    = clean($_POST['email']);
    $password = clean($_POST['password']);
    $phone      = clean($_POST['phone']);
    $gender   = clean($_POST['gender']);
    $role     = clean($_POST['role']);


            if(!empty($name))
            {
            $name = strvalid($name);

                if(!$name){
                $error['name'] = 'name is wrong ';
                }
                
            }

            else {
                $error['name'] = "enter name ";
            }

            if(!empty($email)){


                $email = emailvalid($email);
                if(!$email){
                    $error['email'] ='email is wrong';
                }

            }
            else {
                $error['email'] = "enter email ";
            }


            if(!empty($password)){
                $password = passvalid($password);
                if(!$password){
                    $error['password'] ='password is wrong';
                }
               
            }
            else{
                $error['password'] = "enter password ";
            }    



            if(!empty($phone))
            {
            $phone = phonevalid($phone);

                if(!$phone){
                    $error['phone'] = 'phone is wrong ';
                }
            }
    
             if(!empty($gender)){
                
               
                $gender = genvalid($gender);
                
                if(!$gender){
                    $error['gender'] = 'age is wrong ';
                }
            }
            
    
            if(!empty($role))
            {
            $role = rolevalid($role);

                if(!$role){
                    $error['role'] = 'role is not found ';
                }
            }
    
    
            
    

    if(count($error) > 0)
    {    
        foreach($error as $key => $value)
        {
            echo $value.'<br>';
        }
    }
    else
    {
    $password = sha1($password);
    $sql ="INSERT INTO `admin`( `name`, `email`, `password`, `phone`,`role`) VALUES ('$name', '$email','$password','$phone','$role')";
    $run = mysqli_query($con,$sql);
    if($run){
        $_SESSION['reg']= 'register successfully';
        header('location: index.php');
    }
    else {
        echo'error ,try again';
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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center" style="margin: 30px;">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Admin Account</h3></div>
                                    <div class="card-body">
                                     <form  action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  enctype ="multipart/form-data">

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Name</label>
                                                        <input id="inputFirstName" type="text" placeholder="Enter first name" name="name" style="width: ;width: 204%;/*! margin: ; */padding: 10px;border: 1px black solid;border-radius: 5px;" class="form-control py-4">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email">
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password">
                                                    </div>
                                                </div>
                                              

                                                  <div class="form-group">
                                                    <label for="formGroupExampleInput">phone</label>
                                                    <input type="text" name = "phone" class="form-control" id="formGroupExampleInput" placeholder="Enter phone" style="padding: 23px;margin: -5px auto;">
                                                  </div>


                                                <fieldset class="form-group">
                                                    <div class="row">
                                                      <legend class="col-form-label col-sm-2 pt-0" style="/*! margin: 149px; */display: flex;margin: 1px;">Gender</legend>
                                                      <div class="col-sm-10" style="display: flex;/*! margin: -2px; */flex-direction: column;">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked="">
                                                          <label class="form-check-label" for="gridRadios1">
                                                            male
                                                          </label>
                                                        </div>
                                                        <div class="form-check" style="desplay:inline-block">
                                                          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                                                          <label class="form-check-label" for="gridRadios2">
                                                              Female
                                                            </label>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </fieldset>

                                                
                                                    <select class="form-control" name="role">
                                                      <option name= "admin" value="admin">admin</option>
                                                      <option name = "superadmin" value="superadmin">super admin</option>

                                                    </select>
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


