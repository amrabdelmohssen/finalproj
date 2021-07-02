<?php 
require "../dbconnection.php";
require "../validation.php";

$nameU = $nameU2 = ' ';

//if ($_SERVER['REQUEST_METHOD'] == 'GET'){
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  
    header("location:home.php");
    
}else

$id11 = $_GET['id'];
$sql = "select * from user where id = $id11";	
$run = mysqli_query($con,$sql);
$row = mysqli_num_rows($run);
echo mysqli_error($con);
if($row > 0 ){

  $data2 = mysqli_fetch_assoc($run);
  $emailU = $data2['email'];
  $emailR = $_SESSION['emailF'];
  $nameU2 = $data2['name'];
}	
//}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$emailS = clean($_POST['emailS']);
$emailR = clean($_POST['emailR']);
$message =clean($_POST['message']);
$nameU   = clean($_POST['nameU']);
//$key =clean($_POST['key']);
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

	
	// validate email which send message
if(!empty($emailS)){


                $emailS = emailvalid($emailS);
                if(!$emailS){
                    $error['emailS'] ='your email is wrong ';
                }

	
	
}else {
             $error['emailS'] ='enter your email ';

} 

	
	// validate email which receive message
	
	
if(!empty($emailR)){
	
	$emailR = emailvalid($emailR);
                if(!$emailR){
                    $error['emailR'] ='another email is wrong ';
                }	
}else {
             $error['emailS'] ='enter another email ';

	
	
	// validate key
} 
	
// if(!empty($key)){
// 	$key = egevalid($key);
// 		if(!$key){
// 			$error['key'] ="key must be 1 - 100";
// 		}
	
// }else{
//              $error['key'] ='enter key ';

// }
	
	
	
	// validate textarea
	
	if(empty($message))
	{
		$error[message] = 'enter your message';
	}else{
	}
	

if (count($error) > 0 )	{
	
	foreach($error as $key => $value){
		echo $value.'<br>';

	}

}else{
  $sqlR = "SELECT * FROM `user` WHERE email= '$emailR'"; 
  $runR = mysqli_query($con,$sqlR);
  //echo mysqli_error($con);
  
  if(mysqli_num_rows($runR) > 0){
  $dataR = mysqli_fetch_assoc($runR);
   $idR = $dataR['id'];
   $nameU = $dataR['name'];    

  }



	$sqlR = "insert into `receive` (`email` ,`receive_id`) VALUES ('$emailR',$idR)";
	$runR = mysqli_query($con,$sqlR);
  echo mysqli_error($con);
	$sqlS = "insert into `send` (`email`,`send_id`) values ('$emailS',$id)";
  $runS = mysqli_query($con,$sqlS);
  //echo mysqli_error($con);
  //exit();
	if($runS && $runR){
    $idr = "select * from `receive` where receive_id = $idR";
     $runr = mysqli_query($con,$idr);
    if(mysqli_num_rows($runr) > 0){
      $datar = mysqli_fetch_assoc($runr);
    }
     $ids = "select * from `send` where send_id = $id";
     $runs = mysqli_query($con,$ids);
     if(mysqli_num_rows($runs) > 0){
      $datas = mysqli_fetch_assoc($runs);
    }

    $ids = $datas['id'];

    $_SESSION['ids'] = $ids;
    $idr =$datar['id'];
     
    //$message = 

    // cipher text

//     $message = str_split($message);

//  //echo 'cipher text : ';
// for($i = 0 ; $i < count($message) ;$i++)
// {
//     $message[$i] = (ord($message[$i]));
//     $message[$i]= $message[$i] + $key;
//     $message[$i]= chr($message[$i]) ;
//     //echo $arr[$i];
//     //echo $name[$i];
// }

// echo $message= implode("",$message);;






	$sqlM = "insert into `message` (`mess` ,`send_id`,`recieve_id`) values ('$message',$ids,$idr)";
 	$runM = mysqli_query($con,$sqlM);
   echo mysqli_error($con);

		//query to display message 

$sql2 = 
"SELECT `mess` FROM `message` JOIN `send` on send.send_id = 44 JOIN `receive` on receive.receive_id = 44 " ; 
  // JOIN `receive` on receive.receive_id = 45 "; 
$sql3 = "SELECT `mess` FROM `message` JOIN `send` on send.send_id = 45 JOIN `receive` on receive.receive_id = 45  "; 
 
 $run2 = mysqli_query($con,$sql2);
 $run3 = mysqli_query($con,$sql3);

$row2 = mysqli_num_rows($run2);
 $row3 = mysqli_num_rows($run3);
// echo $row;
// exit();
//echo mysqli_error($con);
if(($row2 > 0) || ($row3 > 0)){
  
     ?>  
<div class = 'message'>
              
       <?php
       if ($nameU2 != ' '){
       while($data = mysqli_fetch_assoc($run2)){?> 
           <h5><?php echo $nameU2.' : '.$data['mess'].'<br>';?></h5>
       
                <?php }
                }
          elseif($nameU != ' '){
            while($data = mysqli_fetch_assoc($run3)){?> 
              <h5><?php echo $nameU.' : '.$data['mess'].'<br>';?></h5>
         <?php }




	}else{
		echo "error";
	}
?>
  </div>
	<?php
} 
  }	
	
	
	
}
	

}

?>
<!doctype html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <!-- <link href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/css.css" rel="stylesheet"> -->

    <title>Earth - Free HTML5 Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/bootstrap.css" rel="stylesheet"> -->


    <!-- Additional CSS Files
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/fontawesome.css">
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/tooplate-main.css">
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/owl.css">-->
	<style>
		body{
			
			background-color: #FDBF00;
		}

    .message{

      background-color: black;
    color: white;
    padding: 10px 48px;
    width: 32.5%;
    margin: auto;
    border: 1px black solid;
    border-radius: 9px;
    height : 1000px;
}
		
		form {

    box-shadow: 0px 0px 20px;
    height: 0%;
    margin: auto;
        margin-top: auto;
        margin-bottom: auto;
    margin-bottom: 30px;
    background-color: black;
    width: 40%;
   
}

textarea {

  position: fixed;
    top: 500px;
    height: 53px;
    bottom: 11px;
    width: 39.6%;
    border: 1px white solid;
    border-radius: 6px;
}		
	button {
    position: fixed;
top: 501px;
right: 407px;
text-align: right;
padding: 8px;
background-color: gold;
border: 1px white solid;
border-radius: 9px;
height: 8.6%;
  }
  .empty{
    width: 39.8%;
    height: 61px;
    position: fixed;
    z-index: 44;
    bottom: 0px;
    background-color: #FDBF00;
    border: ;
    left: 407px;
}
	</style>		
  </head>
<body>
    
	  <form id="contact" action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" style="margin-top: 45px;">
		  <input type="hidden" name="id" value = "<?php echo $data2['id'];?>">
            <div class="row">
                          <div class="col-md-12">
                           
                          </div>
                          
                              <input name="emailS"  type="hidden" value = "<?php echo $emailU?>" class="form-control" id="name" placeholder="from..." required="">
                              <input name="nameU"  type="hidden" value = "<?php echo $data2['name'];?>" class="form-control" id="name" placeholder="from..." required="">
                             
                          <div class="col-md-6">
                            
                              <input name="emailR" type="hidden" value = "<?php echo $emailR?>" class="form-control" id="email" placeholder="to..." required="">
                            
                          </div>
							<div class="col-md-6">
                            <!-- <fieldset>
                              <input name="key" type="number" class="form-control" id="name" placeholder="enter key 1-100"  style="margin-left: 265px;width: 45%;}">
                            </fieldset> -->
                          </div>
							
                          <div class="col-md-12">
                            
                              <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""  ></textarea>
                                                      </div>
                          <div class="col-md-12">
                            
                              <button type="submit" id="form-submit" class="button" >Send Now</button>
                                                    </div>
                    
                </form>
	
	
	</form>

  <div class = 'empty'></div>
</body>
</html>



