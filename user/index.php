

<?php
require "../dbconnection.php";
require "../validation.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET'){
$idu = $_GET['id'];
$sql = "SELECT * FROM `user` where id =".$idu;
$run = mysqli_query($con , $sql);
$data = mysqli_fetch_assoc($run);
$id = $data['id'];
}

// search 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $emailF = clean($_POST['emailF']);
  $idF = clean($_POST['idF']);

  $sqlS =  "select email from `user` where email='$emailF'";
  $runS =mysqli_query($con,$sqlS);
  echo mysqli_error($con);
  $rowS = mysqli_num_rows($runS);
  if ($rowS > 0){
    while ($dataS = mysqli_fetch_assoc($runS)){
      $_SESSION['emailF'] = $dataS['email']; 
       header("location: message.php?id=".$idF);
}
    


  }
}

?>






<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/css.css" rel="stylesheet">

    <title>Easy Chat</title>

    <!-- Bootstrap core CSS -->
    <link href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/bootstrap.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/fontawesome.css">
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/tooplate-main.css">
    <link rel="stylesheet" href="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/owl.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .bs-example{
        margin: 20px;
    }
</style>
  </head>
<!--
Tooplate 2113 Earth
https://www.tooplate.com/view/2113-earth
-->
  <body style ="background-image='contact-bg.jpg'">
<!-- navbar  -->
<ul  style = "list-style-type: none;
  margin: 0;
  padding: 8px;
  overflow: hidden;
  background-color: #333; display :flex;
  margin: -41px 0px;
  direction: rtl;
width: 100%;
position: absolute;
z-index: 44;
  ">

  <li style = "padding: 14px 15px;"><a class="active href="#home"></a></li>
  <li style = "padding: 14px 15px;"><a href="http://localhost/ntiGroup3/blo/user/logout.php">Logout</a></li>

  <li style = "padding: 14px 15px;"><a href="http://localhost/ntiGroup3/blo/user/ed.php?id=<?php echo $data['id'];?>">Edite</a></li>
  <li style = "padding: 14px 15px;"><a href="http://localhost/ntiGroup3/blo/user/pass.php?id=<?php echo $data['id'];?>">Change password</a></li>
  <div class="search-container">
    <form  action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  style = "margin: 10px 250px 0px 0px;">
    <input type="hidden" name="idF" value = "<?php echo $data['id'];?>">

      <button type="submit"><i class="fa fa-search" style="padding: 6px;"></i></button>
      <input type="text" placeholder="..Enter email to start chat" name="emailF" style = "width: 295px;
border: 1px white solid;
border-radius: 6px;
padding: 5px; text-align:left;">
    </form>
  </div>
</ul>      



<div>
<div>EASY CHAT FOR YOU</dive>

<div ><img src="contact-bg.jpg" alt="background"></div>

</div> 

    <div class="sequence" style="display: none;">

      <div class="seq-preloader" style="display: none;">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"></path><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"></path><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"></path></g></svg>
      </div>
      
    </div>
    
        <div class="logo" style ="height: 51px;">
            <h1>Easy chat</h1>
        </div>
        
        <div class="slides" style="transform: translateX(0px);  background-image: contact-bg">
          <div class="slide" id="1">
            <div id="slider-wrapper">
                <div class="container">
  
  <p> <?php 
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
      
      
      ?></p></p>  
         
<ul  style = "list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333; display :flex;
  margin: -41px 0px;
  direction: rtl;
width: 112%;
position: absolute;
z-index: 44;
  ">

  <li style = "padding: 14px 15px;"><a class="active href="#home"></a></li>
  <li style = "padding: 14px 15px;"><a href="http://localhost/ntiGroup3/blo/user/logout.php">Logout</a></li>

  <li style = "padding: 14px 15px;"><a href="http://localhost/ntiGroup3/blo/user/ed.php?id=<?php echo $data['id'];?>">Edite</a></li>
  <li style = "padding: 14px 15px;"><a href="http://localhost/ntiGroup3/blo/user/pass.php?id=<?php echo $data['id'];?>">Change password</a></li>
  <div class="search-container">
    <form  action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  style = "margin: 17px 250px 0px 0px;">
    <input type="hidden" name="idF" value = "<?php echo $data['id'];?>">

      <button type="submit"><i class="fa fa-search" style="padding: 6px;"></i></button>
      <input type="text" placeholder=".." name="emailF" style = "width: 295px;
border: 1px white solid;
border-radius: 6px;
padding: 5px; text-align:left;">
    </form>
  </div>
</ul>      

</div>
                <div id="image-slider">
                  
                  <ul>
                    <li class="">
                      <div class="slide-caption">
                        
                        <h6>New Arrival</h6>
                        <h2>Beautiful<br>Earth</h2>
                      </div>
                    </li>
                    <li>
                      <div class="slide-caption">
                        <h6>Latest One</h6>
                        <h2>Tech<br>Meeting</h2>
                      </div>
                    </li>
                    <li>
                      <div class="slide-caption">
                        <h6>Your Update</h6>
                        <h2>Smart<br>Devices</h2>
                      </div>
                    </li>                      
                  </ul>
                </div>
                <div id="thumbnail">
                  

                </div>
              </div>
        </div>
       
        <div class="slide" id="3">
          
            <div class="content third-content">
              
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel owl-theme owl-loaded owl-drag">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 3228px;"><div class="owl-item active" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item"> 
                                	<a href=""><img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-01.jpg" alt=""></a>
                                    <div class="down-content">
                                    <h4>Donec non sagittis</h4>
                                        <h6>$25.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <a href=""><img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-02.jpg" alt=""></a>
                                    <div class="down-content">
                                        <h4>Nulla a pharetra</h4>
                                        <h6>$35.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-03.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Aliquam convallis</h4>
                                        <h6>$45.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-04.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Vivamus vitae #4</h4>
                                        <h6>$55.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-05.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Vivamus vitae #6</h4>
                                        <h6>$65.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-06.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Vivamus vitae #8</h4>
                                        <h6>$75.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-07.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Donec non sagittis</h4>
                                        <h6>$85.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-08.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Curabitur sed 8</h4>
                                        <h6>$95.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-09.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Curabitur sed 10</h4>
                                        <h6>$105.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-10.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Curabitur sed 12</h4>
                                        <h6>$115.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-11.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Curabitur sed 14</h4>
                                        <h6>$125.00</h6>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 268.95px;"><div class="col-md-12">
                                <div class="featured-item">
                                    <img src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/item-12.jpg" alt="">
                                    <div class="down-content">
                                        <h4>Curabitur sed 16</h4>
                                        <h6>$135.00</h6>
                                    </div>
                                </div>
                            </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
                    </div>
                </div>
            </div>
        </div>
		<?php	

			// message
$name ='';
 			
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = ($_POST["message"]);
    

   // $name = 'my name is amr 210099';
//echo $name."<br>";
$key = 3;
$arr = str_split($name);

 echo 'cipher text : ';
for($i = 0 ; $i < count($arr) ;$i++)
{
    $arr[$i] = (ord($arr[$i]));
    $arr[$i]= $arr[$i] + $key;
    $arr[$i]= chr($arr[$i]) ;
    echo $arr[$i];
    //echo $name[$i];
}
	
$sql = "insert into `massege` `mess` valeus('$arr') where ";
echo "<br>";
for($i = 0 ; $i < count($arr) ;$i++)
{
    $arr[$i] = (ord($arr[$i]));
    $arr[$i]= $arr[$i] - $key;
    $arr[$i]= chr($arr[$i]) ;
    echo $arr[$i];
    //echo $name[$i];
}
}

else {
    echo 'error';
}

			
			?>
			
        <div class="slide" id="4">
            <div class="content fourth-content">
                <div class="container-fluid">
                    <form id="contact" action="" method="post">
                        <div class="row">
                          <div class="col-md-12">
                            <h2>Say Hello!</h2>
                          </div>
                          <div class="col-md-6">
                            <fieldset>
                              <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6">
                            <fieldset>
                              <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required="">
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <fieldset>
                              <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="button">Send Now</button>
                            </fieldset>
                        </div>
                    
                </div></form>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/jquery.js"></script>
    <script src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/bootstrap.js"></script>


    <!-- Additional Scripts -->
    <script src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/owl.js"></script>
    <script src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/accordations.js"></script>
    <script src="Earth%20-%20Free%20HTML5%20Bootstrap%20Theme_files/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // navigation click actions 
            $('.scroll-link').on('click', function(event){
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
            // scroll to top action
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({scrollTop:0}, 'slow');         
            });
            // mobile nav toggle
            $('#nav-toggle').on('click', function (event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        // scroll function
        function scrollToID(id, speed){
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({scrollTop:targetOffset}, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
        if (typeof console === "undefined") {
            console = {
                log: function() { }
            };
        }
    </script>

  
</div></body></html>