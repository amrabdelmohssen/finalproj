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
$sql = "select * from user where id =".$id1;
$run = mysqli_query($con , $sql);
$check = mysqli_num_rows($run);
    if($check == 0)
    {
        header("location:disp.php");

    }
    else
    {
        $data = mysqli_fetch_assoc($run);
    }

    

}




$name = $email = $password = $age = '';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    
   
    
    
    $name     = clean($_POST['name']);
    $email    = clean($_POST['email']);
    $age      = clean($_POST['age']);
    $gender   = clean($_POST['gender']);
    
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

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
                    $error['email'] ='email is wrong ';
                }

            }
            else {
                $error['email'] = "enter email ";
            }
    
    
    



            if(!empty($age))
            {
            $age = egevalid($age);

                if(!$age){
                    $error['age'] = 'age is wrong ';
                }
            }
            
            if(!empty($gender)){
                
               
                $gender = genvalid($gender);
                
                if(!$gender){
                    $error['gender'] = 'age is wrong ';
                }
            }
    

            if(count($error) > 0)
            {    
                
                $_SESSION['ERROR'] = $error;
                header("Location: ed.php?id=".$id);

                


            }
            else
            {



                $sql ="UPDATE `user` SET `name`='$name',`email`='$email',`age`=$age ,`gender`= '$gender' WHERE id =".$id;
                $run = mysqli_query($con,$sql);

                if($run){
                    $_SESSION["edit"] = 'edit successfully';
                    header('location: disp.php');
                }
                else {
                    echo'error ,try again';
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

  
    <input type="hidden" name="id"  value="<?php echo $data['id'];?>">
 
  <div class="form-group">
    <label for="exampleInputPassword1">age</label>
    <input type="number" name="age" value="<?php echo $data['age']?>" class="form-control"  placeholder="age">
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

  





  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
    
</div>
                     

       
</body>
</html>


