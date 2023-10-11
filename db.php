<!-- <?php

session_start();
if(!isset($_SESSION['Admin_information']))
{
   
    header("Location: Admin.php");
    exit;
}                   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="plugins/css/all.min.css" />
<script type="text/javascript" src="plugins/js/all.min.js"></script>
    
    <title>Document</title>
    
    
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline mx-auto my-2">
            <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
            
        </form>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                <img id="bell" class="user_logo"src="Images/icon_not.png" alt="category.logo">
                <span class="sr-only"></span></a>
            </li>
            
                
            <div class="dropdown">
        
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <img id="logouts" class="logout" src="Images/log.png" alt="logout">
  </a>

  <ul class="dropdown-menu dropdown-menu-end">
    
    <li><a class="dropdown-item" href="#">
    <button class="btnn" name="Logout">Setting</button>
    </a></li>
    <li><a class="dropdown-item" href="#">
    <button class="btnn" name="Logout">Profile</button>
    </a></li>
    <li><a class="dropdown-item" href="#"><div class="headers">
        <form method="POST">
            <button class="btnn" name="Logout">Log out</button>
        </form>
    </div></a>

    <?php
        if(isset($_POST['Logout']))
        {
            session_destroy();

            header("Location: Admin.php");
            exit;
        }
    ?>
</li>
  </ul>
</div>
</div>
                    
                </div>
            </li>
        </ul>
    </div>
</nav>

  

    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img id="sidebarlogo" src="Images/images_shoping.jpg" alt="shopping_logo">
                </span>

                <div class="text header-text">
                    
                </div>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <br>
                <li class="nav-links">
                            <a href="#">
                            <img class="category_logo"src="Images/dashboard.png" alt="category.logo">
                                <span class="text nav-text">Dashboard</span>
                            </a>
                </li>

                    <li class="nav-links">
                            <a href="#">
                            <img class="category_logo"src="Images/Category.png" alt="category.logo">
                                <span class="text nav-text">Category Management</span>
                            </a>
                    </li>

                    <li class="nav-links">
                            
                            <a href="#">
                            <img class="product_logo"src="Images/logo_product.png" alt="category.logo">
                                <span class="text nav-text">Product Management</span>
                            </a>
                    </li> 
                    
                    <li class="nav-links">
                            <a href="#">
                            <img class="user_logo"src="Images/logo_user.jpg" alt="category.logo">
                                <span class="text nav-text">User Management</span>
                            </a>
                    </li> 
                    
                    <li class="nav-links">
                            <a href="#">
                            <img class="user_logo"src="Images/order.png" alt="category.logo">
                                <span class="text nav-text">Order Management</span>
                            </a>
                    </li> 
                    <li class="nav-links">
                            <a href="#">
                            <img class="user_logo"src="Images/Transcation.png" alt="category.logo">
                                <span class="text nav-text">Transcations</span>
                            </a>
                    </li> 
                    <li class="nav-links">
                            <a href="#">
                            <img class="user_logo"src="Images/promotion.png" alt="category.logo">
                                <span class="text nav-text">Promotions</span>
                            </a>
                    </li> 
                    <li class="nav-links">
                            <a href="#">
                            <img class="user_logo"src="Images/notification.png" alt="category.logo">
                                <span class="text nav-text">Notification</span>
                            </a>
                    </li> 
                    <li class="nav-links">
                            <a href="#">
                            <img class="user_logo"src="Images/Q_A.png" alt="category.logo">
                                <span class="text nav-text">FAQ</span>
                            </a>
                    </li> 
                    <li class="nav-links">
                            <a href="#">
                            
                            <div class="dropdown">
                            <img class="user_logo"src="Images/static_page.png" alt="category.logo">
        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Static Pages
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">
          About Us
          </a></li>
          <li><a class="dropdown-item" href="#">
          Terms and Conditions
          </a></li>
          <li><a class="dropdown-item" href="#">
                  Privacy Policy
          </div></a>
                </a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>


   <div class="container">
    
  <div class="row">
  <h3>Dashboard</h3>,
    <div class="col-xl-2">
        <div class="data">
        <span>Active Customer</span><br>
      <span>50</span>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="data">
        <span>Total Order</span><br>
      <span>50</span>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="data">
        <span>Active Customer</span><br>
      <span>50</span>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="data">
        <span>Completed Orders</span><br>
      <span>50</span>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="data">
        <span>Cancelled Order</span><br>
      <span>50</span>
        </div>
    </div>
    
  </div>

  <select name="" id="Graph">
    <option value="Month">Month</option>
    <option value="Year">Year</option>
    <option value="Week">Week</option>
  </select>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<canvas id="myChart" style="width:100%;max-width:1000px"></canvas>

<script>
var xValues = ["Jan", "Feb", "Mar", "Apr", "May","June","July","Aug","Sep","Oct","Nov","Dec"];
var yValues = [0, 1000, 2000, 3000, 4000,3000,1000, 2000, 3000, 3500];
var barColors = ["red", "green","blue","orange","brown","red", "green","blue","orange","pink"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: ""
    }
  }
});
</script>

  

</div>


   
</body>
</html> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/mdb.min.css">
<!-- Plugin file -->
<link rel="stylesheet" href="./css/addons/datatables.min.css">
<link rel="stylesheet" href="css/style.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard" style="width: 500px;">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search" id="searching">
                            </form>
                        </div>
                    </div>

                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                

                            
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                              <button class="btnn">Setting</button> 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="app-profile.html"> <button class="btnn">Profile</button></a>
                                        </li>
                                        
                                        <!-- <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li> -->
                                        <li><a href="page-login.html" >
                                            <form method="POST">
                                            <button class="btnn" name="Logout">Log out</button>
                                            </form>
                                            </a>
                                        <?php
                                            if(isset($_POST['Logout']))
                                            {
                                                session_destroy();

                                                header("Location: Admin.php");
                                                exit;
                                            }
                                        ?>
                                    </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a href="Category.php" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Category Management</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Product Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Order Management</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">Transcation</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Promotions</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Notification</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">FAQ</span>
                        </a>
                    </li>
                    
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Static Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./page-login.html">About Us</a></li>
                            <li><a href="./page-register.html">Terms and Conditions</a></li>
                            <li><a href="./page-lock.html">Privacy Policy</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-2 ">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Active Customer</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Active Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Completed Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                

                <div class="col-lg-2">
                        <div class="card gradient-5">
                            <div class="card-body">
                                <h3 class="card-title text-white">Cancelled Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>


                

                <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card" id="map">
                                <div class="card-body">
                                    <h4 class="card-title">Order Summary</h4>
                                    <select name="" id="chartbox">
                                        <option value="Month">Month</option>
                                        <option value="Year">Year</option>
                                        <option value="Week">Week</option>
                                    </select>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                                    <canvas id="myChart" style="width:100%;width:800px"></canvas>

                                    <script>
                                    const xValues = ["Italy", "France", "Spain", "USA", "Argentina","Italy", "France", "Spain", "USA", "Argentina"];
                                    const yValues = [500, 490, 440,126,240, 150,100,562,147,456,410];
                                    const barColors = ["red", "red","red","red","red","red", "red","red","red","red"];

                                    new Chart("myChart", {
                                    type: "bar",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: {display: false},
                                        title: {
                                        display: true,
                                        text: ""
                                        }
                                    }
                                    });
                                    </script>
                                </div>
                            </div>
                            
                        </div>   
                       
                    </div>

                    <!-- <div id="world-map"></div> -->
                                
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>


    
    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>

