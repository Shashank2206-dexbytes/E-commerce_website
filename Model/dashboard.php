<?php

session_start();
if (!isset($_SESSION['Admin_information'])) {

    header("Location: Admin.php");
    exit;
}

?>

<?php
if (isset($_POST['Logout'])) {
    session_destroy();

    header("Location: Admin.php");
    exit;
}
?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/bootstrap.min.css">
<link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/mdb.min.css">
<!-- Plugin file -->
<link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/addons/datatables.min.css">
<link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/style.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/Modern_Ecommerce_website/Resources/images/favicon.png">
    <link href="/Modern_Ecommerce_website/View/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Modern_Ecommerce_website/View/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet"
        href="/Modern_Ecommerce_website/View/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="/Modern_Ecommerce_website/View/css/style.css" rel="stylesheet">

</head>

<body>


    <!--Main wrapper start-->
    <div id="main-wrapper">

        <!--Nav header start-->
        <?php include "../View/head.php"; ?>
        <!--Nav header end-->

        <!--Header start-->
        <?php include "../View/logoutheader.php"; ?>
        <!--Header end ti-comment-alt-->

        <!--Sidebar start-->
        <?php include "sidebar.php" ?>
        <!--Sidebar end-->

        <!--Content body start-->
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
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total <br>Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Active <br>Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card gradient-1">
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
                        <div class="card gradient-1">
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
    <!--Content body end-->


 <?php include "footer.php" ?>

</body>

</html>