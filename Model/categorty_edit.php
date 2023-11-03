<?php

require "Admin_connection.php";
include "../Controller/Classes/db_connection.php";
include "toaster.php";
include "../Controller/Classes/CategoryClass.php";

$obj=new CategoryClass();

if(isset($_GET['category_id'])){
    $showupData=$obj->showDataUpdate($_GET['category_id']);
}
// if(isset($_POST['update'])){
//     $obj->Dataupdate($_POST);
//     echo "<script>toastr.success('Category Edit successfully!');</script>";
     
//  }


 if (isset($_POST['update'])) {
    $category_id=$obj->get_safe_str($_POST['category_id']);
    $category_name = $obj->get_safe_str($_POST['category_name']);
    $parent_category = $obj->get_safe_str($_POST['parent_category']);
    $category_description = $obj->get_safe_str($_POST['category_description']);
    $category_image = $obj->get_safe_str($_POST['category_image']);
    
    $condition_arr = array(
        'category_id'=>$category_id,
        'category_name' => $category_name,
        'parent_category' => $parent_category,
        'category_description' => $category_description,
        'category_image' => $category_image,
    );
    $condition_arr1 = array(
        'category_id'=>$category_id,
        'category_name' => $category_name,
        'parent_category' => $parent_category,
        'category_description' => $category_description,
        
    );
    if(!empty($category_image))
    {
        $obj->updateData('category', $condition_arr, 'category_id', $category_id);
        echo "<script>toastr.success('Category Edit successfully!');</script>";

    }
    else
    {
        $obj->updateData1('category', $condition_arr1, 'category_id', $category_id);
        echo "<script>toastr.success('Category Edit successfully!');</script>";
    }
    
        
    
    


	?>

	<?php
}


$result1 = $obj->addjoincategory();
$total = mysqli_num_rows($result1);

$data1 = array();

while ($row1 = $result1->fetch_assoc()) {
    $data1[] = $row1;
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/Modern_Ecommerce_website/View/images/favicon.png">
    <link href="/Modern_Ecommerce_website/View/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/category_edit.css">
    <script type="text/javascript" src="/Modern_Ecommerce_website/View/ckeditor/ckeditor.js"></script>

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
                    <h4 class="card-title">Edit Category</h4>
                <div class="basic-form">
                    <form action="" method="POST" >
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Category name</label>
                                 <input type="text" class="form-control" value="<?php echo $showupData['category_name']; ?>" placeholder="Name" name="category_name">
                                </div>
                            <div class="form-group col-md-4">
                            <label>Parent Category </label>
                            <select id="inputState" class="form-control" name="parent_category">
                            <?php
                            foreach ($data1 as $row1)
                            {
                                echo '<option value="' . $row1['category_id'] . '">' . $row1['category_name'] . '</option>';
                            }
                            ?>
                            </select>

                            </div>
                            </div>
                            <div class="form-group">
                                <label for="comment">Category Description</label>
                                <textarea class="form-control h-150px" rows="6" id="comment" name="category_description"><?php echo $showupData['category_description']; ?></textarea>
                            </div>

                            <label for="">Category Image</label><br>
                            <div class="input-group mb-3" id="selectimage">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" onchange=readUrl(this) name="category_image">
                                    <label class="custom-file-label">Choose file</label>
                                    
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="/Modern_Ecommerce_website/Resources/images/member/<?php echo $showupData['category_image'] ?>" value=<?php echo $showupData['category_image'] ?> alt="member" id="bulk" height="50px" width="50px">
                                </div>
                                            
                                </div>
                                <input type="hidden" name="category_id" value="<?php echo $_GET['category_id']; ?>">
                                <a href="category.php">  
                                <button type="button" class="btn btn-danger">Cancel</button>
                                </a>
                                <?php if (isset($_GET['category_id'])) { ?>
                                <button type="submit" class="btn btn-primary" name="update" id="category_id">Update Category</button>
                                <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Content body end -->
     
    <?php include "footer.php" ?>

   
</body>


</html>