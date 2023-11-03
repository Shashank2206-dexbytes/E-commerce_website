<?php
require "Admin_connection.php";
include "../Controller/Classes/db_connection.php";
include "nav.php";
include "../Controller/Classes/CategoryClass.php";

$obj = new CategoryClass();
$id = '';
$result = $obj->getDataWithJoin('category');

if (isset($_GET['id']) && $_GET['id'] != '') 
{
    $id = $obj->get_safe_str($_GET['id']);

    try 
    {
        $result = $obj->getDataWithJoin();

        if ($result) {
            $category_id = $result[0]['category_id'];
            $category_name = $result[0]['category_name'];
            $parent_category = $result[0]['parent_category_name'];
            $category_description = $result[0]['category_description'];
            $category_image = $result[0]['category_image'];
        }

    } catch (Exception $e) 
    {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['category_id'])) 
{
    $show = $obj->Joinquery($_GET['category_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Category</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/Modern_Ecommerce_website/Resources/images/favicon.png">
    <link href="/Modern_Ecommerce_website/View/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        rel="stylesheet">
    <link href="/Modern_Ecommerce_website/View/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link href="/Modern_Ecommerce_website/View/css/style.css" rel="stylesheet">
    <link href="/Modern_Ecommerce_website/View/css/category.css" rel="stylesheet">
</head>

<body>
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
<a href="addnewcategory.php">
<button class="btn-primary" id="Addnew" style="float:right">Add New +</button>
</a>

<h4 class="card-title">Category</h4>
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
<td>
<?php echo $list['category_name'] ?>
</td>
<td>
<?php echo $list['parent_category_name'] ?>
</td>

<td>
<?php
if ($list['status'] == 1) {
    echo '<p><a href="status.php?category_id=' . $list['category_id'] . '&status=0"><button type="button" class="btnactive">Active</button></a></p>';
} else {
    echo '<p><a href="status.php?category_id=' . $list['category_id'] . '&status=1"><button type="button" class="btnInactive">Inactive</button></a></p>';
}
?>
</td>

<td>
    <!-- Button trigger modal -->
    <button type="button" class="btn view-btn" data-toggle="modal"
        data-target="#exampleModal"
        data-category-id="<?= $list['category_id'] ?>"
        data-category-name="<?= $list['category_name'] ?>"
        data-category-description="<?= $list['category_description'] ?>"
        data-category-path="/Modern_Ecommerce_website/Resources/images/member/<?= $list['category_image'] ?>"
        data-category-parent="<?= $list['parent_category_name'] ?>">
        <img src="/Modern_Ecommerce_website/Resources/images/view_logo.png"
            class="imageweightview" alt="view">
    </button>
    <a
        href="categorty_edit.php?category_id=<?php echo $list['category_id'] ?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button id="edit_button">
            <img id="edit"
                src="/Modern_Ecommerce_website/Resources/images/edit_logo.png"
                alt="eidt_logo" height="20px" id="data-category-id">
        </button>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center"
                                                id="exampleModalLabel">Category</h5>

                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modelbox d-flex">

                                                <img id="category-image"
                                                    class="p-3 mb-5 bg-body rounded w-25" src=""
                                                    alt="Category Image" />
                                                <div class="text p-3 w-75 ">
                                                    <h6 class="fw-bold tables tablesize">
                                                        <b>Category: </b><span
                                                            class="float-end fw-normal"
                                                            id="categoryname"></span></h6>
                                                    <h6 class=" fw-bold tablesize"><b>Parent
                                                            Category: </b><span
                                                            class="float-end fw-normal"
                                                            id="category-parent"></span></h6>
                                                    <h6 class="tablesize fw-bold "><b>Descrition
                                                            :</b>
                                                        <spanc class="fw-normal"
                                                            id="category-description"> </spanc>
                                                    </h6>
                                                    <p class="invisible">Category ID: <span
                                                            id="category-id-placeholder"></span>
                                                    </p>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
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
<!--Content body end-->


        <!--Footer start-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
        <!--Footer end-->
    </div>
    <!--Main wrapper end-->

    <!--Scripts-->
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
    <script src="/Modern_Ecommerce_website/Controller/js/category.js"></script>
</body>

</html>