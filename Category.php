<?php
require "Admin_connection.php";
include "db_connection.php";
$obj = new query();
$id = '';
$result = $obj->getData('category');

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $obj->get_safe_str($_GET['id']);
    $condition_arr = array('id' => $id);
    $result = $obj->getData('category', '*', $condition_arr);
    $category_id = $result['0']['category_id'];
    $category_name = $result['0']['category_name'];
    $parent_category = $result['0']['parent_category'];
    $category_description = $result['0']['category_description'];
    $category_image = $result['0']['category_image'];
}

if (isset($_GET['category_id'])) {
    $show = $obj->Joinquery($_GET['category_id']);
}

$joinsqls = "SELECT c1.category_id, c1.category_name, c1.parent_category, c2.category_name AS parent_category_name FROM category c1 INNER JOIN category c2 ON c1.parent_category = c2.category_id;";

$results = $database->executeQuery($joinsqls);

$totals = mysqli_num_rows($results);
$datas = mysqli_fetch_assoc($results);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .btn-primary {
            border-radius: 8px;
            height: 50px;
            width: 100px;
            cursor: pointer;
        }

        #camera {
            height: 100px;
            width: 100px;
        }
    </style>

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
                        <div class="drop-down d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">

                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>

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
                            <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                                <span>English</span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
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
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html"><i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a>
                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="page-login.html">
                                                <form method="POST">
                                                    <button class="btnn" name="Logout">Log out</button>
                                                </form>
                                            </a>
                                            <?php
                                            if (isset($_POST['Logout'])) {
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
                        <a href="Dashboard.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a href="Category.php" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Category Management</span>
                        </a>
                    </li>

                    <li>
                        <a href="product.php" aria-expanded="false">
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

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="Addnewcategory.php">
                                    <button class="btn-primary" id="Addnew" style="float:right">Add New +</button>
                                </a>

                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Parent Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($result['0'])) {
                                                foreach ($result as $list) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $list['category_name'] ?></td>
                                                        <td><?php while ($datas = mysqli_fetch_assoc($results)) { ?>
                                                                <?php echo $datas['parent_category_name']; ?>
                                                                <?php break; ?>
                                                            <?php } ?></td>
                                                        <td><?php
                                                            if ($list['status'] == 1) {
                                                                echo '<p><a href="status.php?category_id=' . $list['category_id'] . '&status=0"><button type="button" class="btnactive">Active</button></a></p>';
                                                            } else {
                                                                echo '<p><a href="status.php?category_id=' . $list['category_id'] . '&status=1"><button type="button" class="btnInactive">Inactive</button></a></p>';
                                                            }
                                                            ?></td>

                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn view-btn" data-toggle="modal" data-target="#exampleModal" data-category-id="<?= $list['category_id'] ?>" data-category-name="<?= $list['category_name'] ?>"
                                                                    data-category-description="<?= $list['category_description'] ?>" data-category-path="images/member/<?= $list['category_image'] ?>"
                                                                    data-category-parent="<?= $datas['parent_category_name'] ?>">
                                                                <img src="images/view_logo.png" class="imageweightview" alt="view">
                                                            </button>
                                                            <a href="categorty_edit.php?category_id=<?php echo $list['category_id'] ?>">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <button id="edit_button">
                                                                    <img id="edit" src="images/edit_logo.png" alt="eidt_logo" height="20px" id="data-category-id">
                                                                </button>
                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center" id="exampleModalLabel">Category</h5>

                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="modelbox d-flex">

                                                                                <img id="category-image" class="p-3 mb-5 bg-body rounded w-25" src="" alt="Category Image" />
                                                                                <div class="text p-3 w-75 ">
                                                                                    <h6 class="fw-bold tables tablesize"><b>Category: </b><span class="float-end fw-normal" id="categoryname"></span></h6>
                                                                                    <h6 class=" fw-bold tablesize" ><b>Parent Category: </b><span class="float-end fw-normal" id="category-parent"></span></h6>
                                                                                    <h6 class="tablesize fw-bold "><b>Descrition :</b> <spanc class="fw-normal" id="category-description"> </spanc></h6>
                                                                                    <p class="invisible">Category ID: <span id="category-id-placeholder"></span></p>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
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

    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.init.js"></script>


    <script>
        document.querySelectorAll('.view-btn').forEach(button => {
            button.addEventListener('click', event => {
                const categoryId = button.getAttribute('data-category-id');
                const categoryName = button.getAttribute('data-category-name');
                const categoryDescription = button.getAttribute('data-category-description');
                const categoryImagePath = button.getAttribute('data-category-path');
                const categoryParent = button.getAttribute('data-category-parent');

                const categoryIdPlaceholder = document.getElementById('category-id-placeholder');
                categoryIdPlaceholder.textContent = categoryId;
                categoryIdPlaceholder.style.display = 'inline';

                document.getElementById('categoryname').textContent = categoryName;
                document.getElementById('category-description').textContent = categoryDescription;
                document.getElementById('category-image').src = categoryImagePath;
                document.getElementById('category-parent').textContent = categoryParent;
            });
        });
    </script>

</body>

</html>
