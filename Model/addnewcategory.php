<?php

require "Admin_connection.php";
include "../Controller/Classes/db_connection.php";
include "toaster.php";
include "../Controller/Classes/CategoryClass.php";
$obj = new Database();
$obj1=new CategoryClass();


$id = '';


$result1 = $obj1->addjoincategory();
$total = mysqli_num_rows($result1);

$data1 = array();

while ($row1 = $result1->fetch_assoc()) {
    $data1[] = $row1;
}

if (isset($_POST['category_add'])) {
    $category_name = $obj->get_safe_str($_POST['category_name']);
    $parent_category = $obj->get_safe_str($_POST['parent_category']);
    $category_description = $obj->get_safe_str($_POST['category_description']);
    $category_image = $obj->get_safe_str($_POST['category_image']);
    
    $checkdata=$obj1->duplicateCheck($_POST);

        
    if ($checkdata['count'] > 0) {
        // Duplicate entry found, display an error message
        echo "<script>toastr.error('Category with the same name already exists!');</script>";
    } else {
        $condition_arr = array(
            'category_name' => $category_name,
            'parent_category' => $parent_category,
            'category_description' => $category_description,
            'category_image' => $category_image,
        );

        if ($id == '') {
            $obj->insertData('category', $condition_arr);
            echo "<script>toastr.success('Category added successfully!');</script>";
        } else {
            $obj->updateData('category', $condition_arr, 'id', $id);
        }
    }
    


	?>

	<?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/Modern_Ecommerce_website/Resources/images/favicon.png">
    <link href="/Modern_Ecommerce_website/View/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/addnewcategory.css">
    <script type="text/javascript" src="/Modern_Ecommerce_website/View/ckeditor/ckeditor.js"></script>
</head>

<body>

    <div id="main-wrapper">
        
<!--Nav header start-->
<?php include "../View/head.php"; ?>
<!--Nav header end-->

        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons" style="width:500px">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard" >
                        <div class="drop-down   d-md-none">
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
                                
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/Modern_Ecommerce_website/Resources/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
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
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Header end ti-comment-alt-->

        <!--Sidebar start-->
        <?php include "sidebar.php" ?>
        <!--Sidebar end-->
   
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            

            <div class="container-fluid">
                <div class="row">
   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ADD Category</h4>
                                <div class="basic-form">
                                    <form action="" method="POST" id="validations">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Category name<span class="required_details">*</span></label>
                                                <input type="text" class="form-control" placeholder="Name" name="category_name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Parent Category </label>
                                                <select id="inputState" class="form-control" name="parent_category">
                                                <!-- <option value="" ></option>; -->
                                        
                                                <?php
                                                
                                                if (!empty($data1)) {
                                                    
        
                                                    foreach ($data1 as $row1) {
        
                                                        echo
                                                        '<option value="' .
                                                            $row1["category_id"] .
                                                            '">' .
                                                            $row1["category_name"] .
                                                            "</option>";
                                                    }
                                                } else {
                                                    echo '<option value="1">No Parent Categories found</option>';
                                                }
                                                ?> 
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Description <span class="required_details">*</span> </label>
                                            <textarea class="form-control h-150px ck_editor_txt" rows="6" id="comment" name="category_description"></textarea>
                                        </div>
                                        <label for="">Category Image<span class="required_details">*</span></label><br>
                                        <div class="input-group mb-3" id="selectimage">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" onchange=readUrl(this) name="category_image" id="category_images">
                                                <label class="custom-file-label">Choose file</label>
                                                
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <img src="/Modern_Ecommerce_website/Resources/images/member/noimage.png" alt="member" id="bulk" height="50px" width="">
                                            </div>
                                            
                                        </div>
                                        
                                        <a href="category.php">  
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                        </a>
                                
                                        <a href="category.php"> 
                                        <button type="submit" class="btn btn-primary" name="category_add">Save</button>
                                        </a>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
        </div>
    
<?php include "footer.php" ?>

</body>

</html>