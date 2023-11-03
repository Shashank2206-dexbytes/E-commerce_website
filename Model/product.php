<?php
require "Admin_connection.php";
include "../Controller/Classes/db_connection.php";
include "../Controller/Classes/ProductClass.php";
$obj = new ProductClass();
$id = '';
$result = $obj->getproductCategories('product');


if (isset($_GET['id']) && $_GET['id'] != '') 
{
    $id = $obj->get_safe_str($_GET['id']);

    try 
    {
        $result = $obj->getproductCategories();

        if ($result) {
            $product_id = $result[0]['product_id'];
            $product_name = $result[0]['product_name'];
            $product_quantity = $result[0]['product_quantity'];
            $product_price = $result[0]['product_price'];
            $product_category_name = $result[0]['product_category_name'];
            $status = isset($_POST["status"]) && $_POST["status"] == "on" ? 1 : 0;
            // $category_image = $result[0]['category_image'];
        }

    } catch (Exception $e) 
    {
        echo "Error: " . $e->getMessage();
    }
}


if(isset($_GET['type']) && $_GET['type']=='delete')
{
    $product_id=$obj->get_safe_str($_GET['product_id']);
    $condition_arr = array(
        'product_id' => $product_id, 
        
    );
    $obj->deleteData('product',$condition_arr);
    
}


$obj->updateProductStatus();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Product</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/Modern_Ecommerce_website/Resources/images/favicon.png">
    <link href="/Modern_Ecommerce_website/View/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        rel="stylesheet">
        <link href="/Modern_Ecommerce_website/View/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
        <link href="/Modern_Ecommerce_website/View/css/style.css" rel="stylesheet">
        <link href="/Modern_Ecommerce_website/View/css/product.css" rel="stylesheet">
        <link href="/Modern_Ecommerce_website/View/css/lightslider.css" rel="stylesheet">

</head>

<body>



    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--Nav header start-->
<?php include "../View/head.php"; ?>
<!--Nav header end-->

        <!--Header start-->
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
                                                <img class="float-left mr-3 avatar-img" src="/Modern_Ecommerce_website/Resources/images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
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
                                <img src="/Modern_Ecommerce_website/Resources/images/user/1.png" height="40" width="40" alt="">
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
        <?php  include "sidebar.php" ?>
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

                                <a href="addproduct.php">
                                    <button class="btn-primary" id="Addnew" style="float:right">Add New +</button>
                                </a>
                                <div class="form-group">
                                               
                                <select id="productselect" class="form-control" name="parent_category">
                                
                                    <option>Category</option>
                                    <option>Electronic</option>
                                    <option>Footwear</option>
                                    <option>Furniture</option>
                                </select>
                                </div>

                                <h4 class="card-title">Product</h4>
                                

                                
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Price/Unit</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                       
                                       if (isset($result[0])) {
                                        foreach ($result as $list) {
                                            $product_id = $list['product_id'];
                                            $product_name = $list['product_name'];
                                            $product_category_name = $list['product_category_name']; 
                                            $product_quantity = $list['product_quantity'];
                                            $product_price = $list['product_price'];
                                            $status = $list['status'];
                                            $statusLabel = ($status == 1) ? 'publish' : 'unpublish';
                                            
                                    ?>
                                            <tr>
                                                <td><?php echo $product_name; ?></td>
                                                <td><?php echo $product_category_name; ?></td>
                                                <td><?php echo $product_quantity; ?></td>
                                                <td><?php echo $product_price; ?></td>
                                                <td>
                                                    <form method="post">
                                                    <input type="hidden" name="id" value="<?php $id ?>">
                                                    <input type="hidden" name="active" value="<?php $statusLabel ?>">
                                                    <button type="button" class="status-toggle btn btn-link tablesize togglelineremove <?php ($statusLabel === 'publish') ? 'publish' : 'unpublish' ?>" data-categoryid="<?= $id ?>" data-status="<?= $statusLabel ?>"><?= $statusLabel ?></button>
                                                </form>
                                                </td>
                                                <td>
                                                    <div class="elements">
                                                    <a
                                                     href="product_edit.php?product_id=<?php echo $list['product_id'] ?>">
                                                        <img class="edit" src="/Modern_Ecommerce_website/Resources/images/edit_logo.png" alt="edit_logo" height="20px">
                                                        </a>
                                                        <!-- <div class="toggle-control form-check form-switch toogle" id="datagridtoggle">
                                                            <input type="checkbox" checked="checked" />
                                                            <span class="control"></span>
                                                        </div> -->
                                                        <div class="form-check form-switch toogle">
                                                    <form method="post">
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                        <div class="toggle-control form-check form-switch toogle" id="datagridtoggle">
                                                            <input type="checkbox" checked="checked" />
                                                            <span class="control"></span>
                                                        </div> 
                                                    </form>
                                                </div>
                                                        <a href="product.php?type=delete&product_id=<?php echo $list['product_id']; ?>"> <img class="delete_icon" src="/Modern_Ecommerce_website/Resources/Images/delete_icon.png" alt="delete_icon">
</a>

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

    
          
    <script>
         const statusButtons = document.querySelectorAll('.status-toggle');
statusButtons.forEach(button => {
    button.addEventListener('click', function() {
        const categoryId = this.getAttribute('data-categoryid');
        let currentStatus = this.getAttribute('data-status');

        // Toggle the status
        const newStatus = (currentStatus === 'publish') ? 'unpublish' : 'publish';

        // Update the button text and data-status attribute
        this.setAttribute('data-status', newStatus);
        this.innerHTML = newStatus;

        // Update the hidden input value
        const activeInput = this.closest('form').querySelector('input[name="active"]');
        activeInput.value = newStatus;

        // Update the button's class to change the text color
        this.classList.toggle('publish');
        this.classList.toggle('unpublish');

        // Display toastr notifications based on the status
        if (newStatus === 'publish') {
            toastr.success('Status updated to Active', 'Status:');
        } else {
            toastr.error('Status updated to Deactive', 'Status:');
        }

        // Manually submit the form
        this.closest('form').submit();
    });
});

const checkboxes = document.querySelectorAll('.form-check-input');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Toggle the status
        const currentStatus = this.checked ? 'publish' : 'unpublish';

        // Update the hidden input value
        const activeInput = this.closest('form').querySelector('input[name="publish"]');
        activeInput.value = currentStatus;

        // Manually submit the form
        this.closest('form').submit();
    });
});

  (function ($) {
    $(function () {
      $('.slider').slick({
        dots: true,
        arrows: false, // Set arrows to false to remove the navigation buttons
        customPaging: function (slick, index) {
          var slide = slick.$slides.eq(index);
          var slideContent = slide.html(); // Get the HTML content of the slide

          // Create a custom indicator using the slide's content
          var customIndicator = '<div class="custom-slide-indicator">' + slideContent + '</div>';

          return customIndicator;
        }
      });
    });
  })(jQuery);

      function changeStatusColor(element) {
  if (element.classList.contains('text-primary')) {
    element.classList.remove('text-primary');
    element.classList.add('text-danger');
    element.textContent = 'Deactivated';
  } else {
    element.classList.remove('text-danger');
    element.classList.add('text-primary');
    element.textContent = 'Activated';
  }
}

    </script>
       <script src="/Modern_Ecommerce_website/View/plugins/common/common.min.js"></script>
    <script src="/Modern_Ecommerce_website/Controller/js/custom.min.js"></script>
    <script src="/Modern_Ecommerce_website/Controller/js/settings.js"></script>
    <script src="/Modern_Ecommerce_website/Controller/js/gleek.js"></script>
    <script src="/Modern_Ecommerce_website/Controller/js/styleSwitcher.js"></script>


    <script src="/Modern_Ecommerce_website/View/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/Modern_Ecommerce_website/View/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/Modern_Ecommerce_website/View/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="/Modern_Ecommerce_website/View/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="/Modern_Ecommerce_website/View/plugins/sweetalert/js/sweetalert.init.js"></script>




</body>

</html>

