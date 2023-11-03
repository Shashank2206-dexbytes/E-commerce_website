<?php

require "../Admin_connection.php";
include "../db_connection.php";
$obj = new query();

$id = '';

$joinsql = "SELECT p.category_name AS parent, p.category_id FROM category c INNER JOIN category p ON c.parent_category = p.category_id;";

$result = $database->executeQuery($joinsql);

$total = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['category_add'])) {
    $category_name = $obj->get_safe_str($_POST['category_name']);
    $parent_category = $obj->get_safe_str($_POST['parent_category']);
    $category_description = $obj->get_safe_str($_POST['category_description']);
    $category_image = $obj->get_safe_str($_POST['category_image']);

    // Check if the category name already exists in the database
    $duplicateCheckSql = "SELECT COUNT(*) as count FROM category WHERE category_name = '$category_name'";
    $duplicateResult = $database->executeQuery($duplicateCheckSql);
    $duplicateData = mysqli_fetch_assoc($duplicateResult);

    if ($duplicateData['count'] > 0) {
        // Duplicate entry found, display an error message
        echo "Category with the same name already exists!";
    } else {
        $condition_arr = array(
            'category_name' => $category_name,
            'parent_category' => $parent_category,
            'category_description' => $category_description,
            'category_image' => $category_image,
        );

        if ($id == '') {
            $obj->insertData('category', $condition_arr);
        } else {
            $obj->updateData('category', $condition_arr, 'id', $id);
        }
    }
	
	//header('location:users.php');
	?>
	<script>
	// window.location.href='users.php';
	</script>
	<?php
}
    include_once('./head.php')
?>
<body>


    
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
                    <b class="logo-abbr"><img src=""<?= BASE_URL_IMAGE; ?>logo.png alt=""> </b>
                    <span class="logo-compact"><img src=""<?= BASE_URL_IMAGE; ?>logo-compact.png alt=""></span>
                    <span class="brand-title">
                        <img src=""<?= BASE_URL_IMAGE; ?>logo-text.png alt="">
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
                                                <img class="float-left mr-3 avatar-img" src=""<?= BASE_URL_IMAGE; ?>avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src=""<?= BASE_URL_IMAGE; ?>avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src=""<?= BASE_URL_IMAGE; ?>avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src=""<?= BASE_URL_IMAGE; ?>avatar/4.jpg" alt="">
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
                                <img src=""<?= BASE_URL_IMAGE; ?>user/1.png" height="40" width="40" alt="">
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
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <?php
            include_once('./sidebard.php')
        ?>

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
                                                <?php
                                                    while($data=mysqli_fetch_assoc($result))
                                                    {?>
                                                    <option value="<?php echo $data['category_id']; ?>" ><?php echo $data['parent'] ?></option>;
                                                    <?php } ?> 
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Description <span class="required_details">*</span> </label>
                                            <textarea class="form-control h-150px ck_editor_txt" rows="6" id="comment" name="category_description"></textarea>
                                        </div>
                                        <label for="">Category Image <span class="required_details">*</span></label><br>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" onchange=readUrl(this) name="category_image" id="category_images">
                                                <label class="custom-file-label">Choose file</label>
                                                
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <img src=""<?= BASE_URL_IMAGE; ?>member/noimage.png" alt="member" id="bulk" height="50px" width="50px">
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

            <script>
                var a=document.getElementById("bulk");
                function readUrl(input)
                {
                        if(input.files){
                            var reader=new FileReader();
                            reader.readAsDataURL(input.files[0]);
                            reader.onload=(e)=>{
                                a.src=e.target.result;
                            }
                        }
                }
            </script>
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
        // CKEDITOR.replace('comment');
        CKEDITOR.replace('comment', {
    enterMode: CKEDITOR.ENTER_BR,  // Use <br> for line breaks instead of <p>
    shiftEnterMode: CKEDITOR.ENTER_P,  // Use <p> for new paragraphs on Shift+Enter
    allowedContent: true,  // Allow any content even if it's not valid HTML
    autoParagraph: false  // Disable automatic <p> tag insertion
});

    </script>
    
    <script src="../plugins/common/common.min.js"></script>
    <script src="<?= BASE_URL_JS; ?>custom.min.js"></script>
    <script src="<?= BASE_URL_JS; ?>settings.js"></script>
    <script src="<?= BASE_URL_JS; ?>gleek.js"></script>
    <script src="<?= BASE_URL_JS; ?>styleSwitcher.js"></script>
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<!-- <script src="script.js"></script> -->
<script>
   $('#validations').validate({
    rules:{
        category_name: {
            required: true,
        },
       
        category_image:{
            required:true,
        },
        
        
    },
    messages:{
        category_name: {
            required: 'Please Enter the Category name',
         
        },
        category_image: {
            required:'Please enter the Image',
        },
       
        

    },
    
    
});





</script>
</body>

<?php
    


?>

</html>