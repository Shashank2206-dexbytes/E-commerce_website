<?php


class ProductClass extends Database{

	public function showDataUpdate($product_id)
	{
		$sql="select * from  product where product_id=$product_id";
		$data=$this->conn->query($sql);
		$result=$data->fetch_assoc();
		
		return $result;
	}

    public function getCategoriesproduct()
	{
        $query = 'SELECT  c1.category_id, c1.category_name, c1.parent_category, c1.category_description, c1.category_image, c1.status, 
        c2.category_name AS parent_category_name FROM category c1 INNER JOIN category c2 ON c1.parent_category = c2.category_id;
        ';

        $result = $this->conn->query($query);

        if (!$result) {
            die("Query failed: " . $this->mysqli->error);
        }

        return $result; 
	}

	public function getsubcategory()
	{
    $query = 'SELECT DISTINCT c2.category_name AS parent_category_name FROM category c1 INNER JOIN category c2 ON c1.parent_category = c2.category_id;
    ';

    $result = $this->conn->query($query);

    if (!$result) 
	{
        die("Query failed: " . $this->mysqli->error);
    }

    return $result; 
	}
    public function duplicateCheck($data)
	{

		$product_name=$data['product_name'];
		$duplicateCheckSql = "SELECT COUNT(*) as count FROM product WHERE product_name = '$product_name' ";
		$duplicateResult=$this->conn->query($duplicateCheckSql);
		$duplicateData = mysqli_fetch_assoc($duplicateResult);
		return $duplicateData;

	}
    public function Insertimage()
    {
        $extension=array('jpeg','jpg','png','gif');
	    foreach ($_FILES['product_image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['product_image']['name'][$key];
		$filename_tmp=$_FILES['product_image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

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
			$insertqry="INSERT INTO `media`( `image_name`, `creattime`) VALUES ('$finalimg','$creattime') ";
			mysqli_query($conn,$insertqry);


		
		}else
		{
			//display error
		}
	}
}

public function getproductCategories()
    {
        $sql = 'SELECT c2.product_id,c2.product_name,c2.product_quantity,c2.product_price,c2.status,c1.category_name AS product_category_name FROM category 
		c1 INNER JOIN product c2 ON c1.category_id = c2.category_id;';

		$result = $this->conn->query($sql);
				
		if ($result->num_rows > 0) {
			$arr = array();
			
			while ($row = $result->fetch_assoc()) {
				$arr[] = $row;
			}
			
			return $arr;
		} else {
			return 0;
		}
    }

	public function updateProductStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryId = isset($_POST['id']) ? $_POST['id'] : 0;
            $newStatus = isset($_POST['active']) ? ($_POST['active'] == 'Active' ? 1 : 0) : 0;

            $updateParams = array('status' => $newStatus);
            $whereClause = "product_id  = $categoryId";
            $updateResult = $this->updateData123('product', $updateParams, $whereClause);

            if ($updateResult) {
         
            } else {
                // echo "Update failed. Error: " . implode(', ', $this->getResult());
            }
        }
    }


	public function Joinqueryporduct()
	{
		$query="SELECT c2.category_id,c2.sub_category_id,c1.category_name AS product_category_name FROM category c1 INNER JOIN product c2 ON c1.category_id = c2.category_id;";
		$result = $this->conn->query($query);

        if (!$result) {
            die("Query failed: " . $this->mysqli->error);
        }

        return $result; 

	}
	public function showDataUpdateProduct($product_id)
	{
		$query="SELECT media.product_id,media.image_name FROM media INNER JOIN product ON media.product_id = product.product_id;";

        $result = $this->conn->query($query);

        if (!$result) {
            die("Query failed: " . $this->mysqli->error);
        }

        return $result; 
	}

      
    
}

?>