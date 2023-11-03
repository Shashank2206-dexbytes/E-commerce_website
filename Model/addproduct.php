<?php

require "Admin_connection.php";
include "toaster.php";
include "../Controller/Classes/db_connection.php";
include "../Controller/Classes/ProductClass.php";
include "imageconnection.php";
$obj = new ProductClass();

$id = '';

// $showupData=$obj->showDataUpdate($_GET['product_id']);


$productidid='';
$result = $obj->getCategoriesproduct();
$total = mysqli_num_rows($result);

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


$result1 = $obj->getsubcategory();
$total1 = mysqli_num_rows($result1);

$data1 = array();

while ($row1 = $result1->fetch_assoc()) {
    $data1[] = $row1;
}




if (isset($_POST['product_add'])) {
   
    $product_name = $obj->get_safe_str($_POST['product_name']);
    $category_id=$obj->get_safe_str($_POST['category_id']);
  
    $product_description=$obj->get_safe_str($_POST['product_description']);
    $product_price=$obj->get_safe_str($_POST['product_price']);
    $discount=$obj->get_safe_str($_POST['discount']);
    $launch_date=$obj->get_safe_str($_POST['launch_date']);
    $product_quantity=$obj->get_safe_str($_POST['product_quantity']);
    $sku_no=$obj->get_safe_str($_POST['sku_no']);
 
    $checkdata=$obj->duplicateCheck($_POST);
 
    if ($checkdata['count'] > 0) {
        // Duplicate entry found, display an error message
        echo "<script>toastr.error('Product with the same name already exists!');</script>";
    } else {
        $condition_arr = array(
            // 'product_id'=>$product_id,
            'product_name' => $product_name,
            'product_description'=>$product_description,
            'product_price'=>$product_price,
            'discount'=>$discount,
            'product_quantity'=>$product_quantity,
            'sku_no'=>$sku_no,
            'launch_date'=>$launch_date,
            'category_id'=>$category_id,
            
        );

        if ($id == '') {
        $last_id=$obj->insertmultipleimage('product', $condition_arr);
            echo "<script>toastr.success('Product added successfully!');</script>";
        } else {
            $obj->updateData('product', $condition_arr, 'id', $id);
        }
    }
    
    if(isset($last_id)){
        $extension=array('jpeg','jpg','png','gif');
    foreach ($_FILES['image']['tmp_name'] as $key => $value) {
    $filename=$_FILES['image']['name'][$key];
    $filename_tmp=$_FILES['image']['tmp_name'][$key];
    echo '<br>';
    $ext=pathinfo($filename,PATHINFO_EXTENSION);
    $productidid=$last_id;
    $finalimg='';
    if(in_array($ext,$extension))
    {
        if(!file_exists('images/'.$filename))
        {
        move_uploaded_file($filename_tmp, 'images/'.$filename);
        $finalimg=$filename;
        }else
        {
             $filename=str_replace('.','-',basename($filename,$ext));
             $newfilename=$filename.time().".".$ext;
             move_uploaded_file($filename_tmp, 'images/'.$newfilename);
             $finalimg=$newfilename;
        }
        $creattime=date('Y-m-d h:i:s');
        //insert
        $insertqry="INSERT INTO `media`(`image_name`,`product_id`,`creattime`) VALUES ('$finalimg','$productidid','$creattime') ";
       
        mysqli_query($con,$insertqry);

    } 
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
    <title>Add Product</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="/Modern_Ecommerce_website/View/css/style.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="/Modern_Ecommerce_website/View/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="/Modern_Ecommerce_website/View/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="/Modern_Ecommerce_website/View/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="/Modern_Ecommerce_website/View/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="/Modern_Ecommerce_website/View/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="/Modern_Ecommerce_website/View/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/productstyle.css">
    <link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/product.css">
    <script type="text/javascript" src="/Modern_Ecommerce_website/View/ckeditor/ckeditor.js"></script>
    <!-- Add Slick Slider CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">

<!-- Add jQuery and Slick Slider JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>




   
</head>

<body>


    
    <!--Main wrapper start-->
    <div id="main-wrapper">

        <!--Nav header start-->
<?php include "../View/head.php"; ?>
<!--Nav header end-->

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
   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Project Management</h4>
                                
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="ag-format-container">
    <div class="layout">
      <ul class="slider">
        <li>
          <img src="/Modern_Ecommerce_website/Resources/images/member/noimage.png" alt="Image 1">
        </li>
        <li>
          <img src="/Modern_Ecommerce_website/Resources/images/member/noimage.png" alt="Image 2">
        </li>
        <!-- Add more image slides as needed -->
      </ul>
    </div>
  </div>

                  <div class="d-flex mt-5 ml-5 pl-5">
                    <div id="slickSlider" class="">
                    </div>
                  </div>

                  <div class="col-md-12 d-flex mt-5">
                    <div class=" col-md-12">
                      <h4>
                        <strong id="previewEmail" >Category :</strong>
                      </h4>
                      <div class=" d-flex col-md-12">

                        <div class="col-md-4">
                          <h6 ><strong value="<?php echo $showupData['catrgory_id']; ?>">Category :</strong> </h6>

                        </div>
                        <div class="col-md-2 mpreviewCategoryId">
                          <span id="previewCategoryId"></span>
                        </div>

                      </div>


                    </div>
                  </div>

                  <div class=" d-flex col-md-12">

                    <div class="col-md-4">
                      <h6><strong>Sub-Category :</strong> </h6>

                    </div>
                    <div class="col-md-6">
                      <span id="previewsubCategoryId"> </span>
                    </div>

                  </div>

                  <div class=" d-flex col-md-12">

                    <div class="col-md-4">
                      <h6><strong>Price :</strong> </h6>
                    </div>
                    <div class="col-md-6">
                      <span id="previewProduct"> $</span>
                    </div>

                  </div>
                  <div class="mt-3 ml-3 col-md-12">
                    <h6><strong>Description :</strong> <span id="previewEditor" value="<?php echo $showupData['product_description']; ?>></span></h6>
                  </div>


                  <div class="col-md-12 d-flex mt-5">
                    <div class="col-md-4">
                      <div class="form-group d-flex">
                        <label for="quantity"><b class="me-5">QTY:</b></label>
                        <input type="number" class="form-control" id="quantity" min="1" value="1">
                      </div>


                    </div>
                    <div class="col-md-4">
                      <a class="btn buynowcolor btn " href="#" role="button">Buy Now </a>
                    </div>
                    <div class="col-md-4">
                      <a class="btn playnowcolor btn " href="#" role="button">Play Now </a>

                    </div>

                  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                    
<!-- Modal -->
                    <!-- <button type="button" class="btn btn-link buttonsize" id="previewButton" data-toggle="modal" data-target="#modelId">Product Preview</button> -->
                    <!-- <button type="button" class="btn btn-primary" id="preview">Product Privew</button> -->
                    <button type="button" id="preview" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Product Privew</button>
                    <div class="basic-form">
                        <form action="" method="POST" id="validations" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Product Name<span class="required_details">*</span></label>
                                    <input type="text" class="form-control" placeholder="product name" name="product_name">
                                </div>
                                <div class="form-group col-md-4">
                                    <span id="Now_Draft">Publish Now/Draft</span>
                                <label class="toggle-control">
                                            <input type="checkbox" checked="checked" />
                                            <span class="control"></span>
                                            </label>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Category</label>
                                    <select id="inputState" class="form-control " name="category_id">
                                    <?php
                                        foreach ($data as $row) 
                                        {?>
                                        <option value="<?php echo $row['category_id']; ?>" ><?php echo $row['category_name'] ?></option>;
                                        <?php } ?> 
                                        
                                    </select>
                                </div>
                               
                                
                                <div class="form-group col-md-4">
                                    <label>Price Per Unit<span class="required_details">*</span></label>
                                    <input type="number" class="form-control product_name" id="productPrice" placeholder="price" name="product_price">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Discount<span class="required_details">*</span></label>
                                    <input type="number" class="form-control product_name" id="discountPrice" placeholder="discount" name="discount">
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Quantity<span class="required_details">*</span></label>
                                    <input type="text" class="form-control product_name" placeholder="Quantity" name="product_quantity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>SKU<span class="required_details">*</span></label>
                                    <input type="text" class="form-control product_name" placeholder="SKU no" name="sku_no">
                                </div>
                                <div class="col-md-4">
                                    <label class="m-t-20">Launch Date<span class="required_details">*</span></label>
                                    <input type="text" class="form-control product_name" placeholder="" id="mdate" name="launch_date">
                                </div>
                                
                                
                            </div>
                            <div class="form-group">
                                <label>Product Description <span class="required_details">*</span> </label>
                                <textarea class="form-control h-150px ck_editor_txt" rows="6" id="comment" name="product_description"></textarea>
                            </div>
                            <label for="">Product Image <span class="required_details">*</span></label><br>
                            <div class="input-group mb-3" id="multipleimage">
                                <div class="custom-file">
                                <input type="file" name="image[]" id="image" multiple class="d-none" onchange="image_select()" >
                                <button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('image').click()">Chose Image</button>
                            
                                    
                                </div>
                                
                                <div class="d-flex justify-content-start" id="container">
                                
                                </div>
                                
                                </div>
                                
                            </div>
                            

                            <a href="category.php">  
                            <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                            <button type="submit" id="submit" class="btn btn-primary" name="product_add">Save</button>
                            
                            </form>
                    </div>
                </div>
            </div>
        </div>
        
        

                </div>
            </div>
            <!-- Button trigger modal -->




            <script>
           
            </script>
            <!-- #/ container -->
        </div>
        <!--Content body end-->
        
        
    <?php include "footer.php" ?>
    <!-- <script src="script.js"></script> -->
    <!-- Add jQuery -->
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add Slick Slider JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- Add Slick Slider CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">


  



</body>



</html>