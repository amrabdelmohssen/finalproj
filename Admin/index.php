<?php             

    
    include 'header.php';

    
include'dbconnection.php';

//$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
$sql = "SELECT * FROM `admin`";
$run = mysqli_query($con , $sql);
$data = mysqli_fetch_assoc($run);
$id = $data['admin_id'];

}
?>



            


   
       
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table Head Colors</h2> 
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
    <a href="log.php">log out</a>
    <h1 style="margin-left: 228px;">Hello <?php echo $data['name'].'   ||  '.$data['role']; ?></h1>
  <table class="table" style="width: 78%;margin-bottom: 1rem;color: #212529;margin: auto;margin-top: auto;margin-left: auto;margin-left: 229px;margin-top: 61px;">
    <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>  
        <th>phone</th>

          <th>role</th>

        <th>action</th>

      </tr>
    </thead>
    <tbody>
        <?php while($data= mysqli_fetch_assoc($run)){
        ?>
      <tr>
        <td><?php echo $data['admin_id'];?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['phone'];?></td>
        <td><?php echo $data['role'];?></td>
        <td><a href="deladmine.php?id=<?php echo $data['admin_id'];?>" >delet</a>
          <a href="editadmin.php?id=<?php echo $data['admin_id'];?> " style="padding: 0 30px;">edit
            <a href="pass.php?id=<?php echo $data['admin_id'];?>">change password</a>
            </a>
          </td>
        
          
      </tr>
        <?php }?>
    </tbody>
  </table>
 
</div>

   
             
   







    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">uStart Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="log.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                               
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Admin
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>

                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="logout.php">Log out</a>
                                            <a class="nav-link" href="signup.php">sign up</a>
                                        </nav>
                                    </div>
                                    
                                    
                                    
                                    
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        User
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="disp.php?id=<?php echo $id?>">user page</a>
                                           
                                           
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                
                
                
                
                
            </div>
        </div>
        
            <?php 
            
            include 'footer.php';
            
            ?>
        
                    </body>
