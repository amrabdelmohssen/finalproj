<?php 
include'dbconnection.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
$id = $_GET['id'];
//$id=$_SESSION['id'];
$sql = "SELECT * FROM `user`";
$run = mysqli_query($con , $sql);

//$data = mysqli_fetch_assoc($run);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title s>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 style="text-align: center;">USER</h2> 
<!--    || <h2><?//php echo $_SESSION['error']; ?></h2>-->
    
    
  <p>
      
      <?php 
      //for password
      
      if(isset($_SESSION['pass'])){
           echo $_SESSION['pass'];
           unset($_SESSION['pass']);}
      
      //for editing
          if(isset($_SESSION['edit'])){
           echo $_SESSION['edit'];
           unset($_SESSION['edit']);}      
       //for regestration                                  
if(isset($_SESSION['reg'])){
           echo $_SESSION['reg'];
            unset($_SESSION['reg']);}       
      //for deleting
      if(isset($_SESSION['del'])){
           echo $_SESSION['del'];
          unset($_SESSION['del']);}
      
      
      ?></p>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>  
        <th>age</th>
          <th>gender</th>  
        <th>action</th>
          
      </tr>
    </thead>
    <tbody>
        <?php while($data = mysqli_fetch_assoc($run)){
        ?>
      <tr>
        <td><?php echo $data['id'];?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['age'];?></td>
        <td><?php echo $data['gender'];?></td>

        <td><a href="deluser.php?id=<?php echo $data['id'];?>" >delet</a>
          <a href="ed.php?id=<?php echo $data['id'];?> " style="padding: 0 30px;">edit
            <a href="pass.php?id=<?php echo $data['id'];?>">edit password</a>
            </a>
          </td>
        
          
      </tr>
        <?php }?>
    </tbody>
  </table>
 
</div>