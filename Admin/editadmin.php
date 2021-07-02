<?php 

require 'dbconnection.php';
require 'validation.php';




if($_SERVER['REQUEST_METHOD'] == 'GET'){
//validate if the id is found or not and is numeric or not  
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){

    header("location:index.php");
    
}




//validate if the id is found in database or not 
$id = $_GET['id'];    
$sql = "select * from admin where admin_id =".$id;
    
$run = mysqli_query($con , $sql);
$check = mysqli_num_rows($run);
    
    
    if($check == 0)
    {
        header("location:index.php");

    }
    else
    {
        $data = mysqli_fetch_assoc($run);
//        print_r($data);
//        exit();
        
    }

    

}




$name = $email = $password =  '';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    
   
    
    $id       = clean($_POST['id']);
    $name     = clean($_POST['name']);
    $email    = clean($_POST['email']);
    $phone     = clean($_POST['phone']);
    $gender   = clean($_POST['gender']);
    $role     = clean($_POST['role']);
//    echo $id.$name.$email.$phone.$gender.$role;
//    exit();

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
                    $error['gender'] = 'gender is wrong ';
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
                
                $_SESSION['ERROR'] = $error;
                header("Location:editadmin.php?id=".$id);

                


            }
            else
            {

//echo $id.$name.$email.$phone.$gender.$role;
//    exit();
                $sql ="UPDATE admin SET `name`='$name',`email`='$email',`phone`='$phone' , `gender` = '$gender',`role` = '$role' WHERE admin_id=".$id;
                
                
                
                
                
                
                $run = mysqli_query($con,$sql);
                
        
                
                
                
                
                
                if($run){
                    
                    $_SESSION["edit"] = 'edit successfully';
                    header('location: index.php');
                }
                else {
                    header("Location:editadmin.php?id=".$id);

                }
            

    
    
}

}
// 



if(isset($_SESSION['ERROR']))
{
foreach($_SESSION['ERROR'] as $key => $value)
{
    echo $key.">>".$value.'<br>';
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


<div class="container">
  <h2>Edite</h2>

  <form   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="POST"  enctype ="multipart/form-data">
 
  <div class="form-group">
    
    <label for="exampleInputEmail1">Name</label>
    <input type="text"   name="name" value="<?php echo $data['name']?>" class="form-control" id="exampleInputName"     aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"  name="email" value="<?php echo $data['email']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  
    <input type ="hidden" name="id"  value="<?php echo $data['admin_id'];?>">
 
  <div class="form-group">
    <label for="exampleInputPassword1">phone</label>
    <input type="number" name="phone" value="<?php echo $data['phone']?>" class="form-control"  placeholder="age">
  </div>
      

<fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>
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




  <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
  
</form>
    
</div>
                     

       
</body>
</html>
