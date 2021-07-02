
<?php 
require "../dbconnection.php";
require "../validation.php";
$idS = '';
//echo $idS = $_SESSION['ids'] ;


// code from user 
//exit();


if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $idUG = $_GET['id'];
}
// i need id for friend 1   


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //$key = clean($_POST['key']);
    $idU = $_POST['id'];

// code for another person
$friend1 = 'amr.amor100@yahoo.com';
$sql2 = "SELECT id FROM `send` WHERE email = '$friend1'"; 
$run2 = mysqli_query($con,$sql2);
//echo mysqli_error($con);
$row = mysqli_num_rows($run2);
if($row > 0){

  $data = mysqli_fetch_assoc($run2);
  $id2 = $data['id'];


//   $sql2 = "SELECT mess FROM `messages` WHERE (reciever_id = '$id2' or send_id = '$id2' ) AND (reciever_id = '$idU' OR orsend_id = '$idU' )"; 
// $run2 = mysqli_query($con,$sql2);

}



$sql = "SELECT * FROM `user` where id =".$idU;
$run = mysqli_query($con , $sql);
$data = mysqli_fetch_assoc($run);
$id = $data['id'];

$sql = "select * from `receive` where receive_id = $idU";	
$run = mysqli_query($con,$sql);
$row = mysqli_num_rows($run);
echo mysqli_error($con);
if($row > 0 ){

$data = mysqli_fetch_assoc($run);

$idR = $data['id'];

//query to display message 

$sql2 = "SELECT mess FROM `message` WHERE (recieve_id = '$id2' or recieve_id = '$idU' ) AND (send_id = '$id2' OR send_id = '$idU' )"; 

$run2 = mysqli_query($con,$sql2);
$row = mysqli_num_rows($run2);

//echo mysqli_error($con);
if($row > 0 ){
        $data = mysqli_fetch_assoc($run2);
      
        foreach($data as $val){
          echo $val.'<br>';
        }
        
}

//echo mysqli_error($con);
//exit();

// get id massage for another sender





// $sql = "select * from message where recieve_id = $idR AND send_id = $idS ";	
// $run = mysqli_query($con,$sql);
// $row = mysqli_num_rows($run);
// echo mysqli_error($con);
// if($row > 0 ){



//   $data = mysqli_fetch_assoc($run);

//   $keyDB = $data['k'];
//   if($keyDB == $key)
//   {
//   $message = $data['mess'];
//   $_SESSION['message'] = $message;
//   header("location: receive.php?id=".$idU);
//   }else{
//       header("location: receive.php?id=".$idU);
//            $message = 'key is wrong';
//            $_SESSION['message'];
//   }

// }
}






    


}



?>

<!-- <form  action="<?php //echo $_SERVER['PHP_SELF']; ?>"   method="POST"  enctype ="multipart/form-data">
<input name = 'key' type = "number">
<input type = 'text' name = 'id' value = "<?php //echo $idUG?>">
<button type="submit" class="btn btn-primary">Enter</button>


</form> -->

<!doctype html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/css.css" rel="stylesheet">

    <title>Earth - Free HTML5 Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/bootstrap.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/fontawesome.css">
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/tooplate-main.css">
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/owl.css">
	<style>
		body{
			
			background-color: #097ACA;
		}
		
		form {
	margin-top: 45px;
    border: 1px black solid;
    border-radius: 6px;
    box-shadow: 0px 0px 20px;
}
		}
	
	</style>		
  </head>
<body>
	
	  <form id="contact" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" style="margin-top: 45px; background-color : #0C5297;
">
		  <input type="hidden" name="id" value ="<?php echo $idUG?>">
                        <div class="row">
                          <div class="col-md-12">
                            <h2>receive message</h2>
                          </div>
                          
                            <fieldset>
                              <input name="key" type="number" class="form-control" id="name" placeholder="enter key 1-100" required="" style="margin-left: 260px;width: 45%;}">
                            </fieldset>
                          </div>
							
                          <div class="col-md-12">
                            <fieldset>
                              <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..."><?php 

                              
                              ?></textarea>
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="button">receive Now</button>
                            </fieldset>
                        </div>
                    
                </form>
	
	
	</form>
</body>
</html>

?>

<?php 

//unset($_SESSION['message']);
//$_SESSION['message'] = '';

?>