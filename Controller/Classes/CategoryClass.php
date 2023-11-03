<?php


class CategoryClass extends Database{


    public function showDataUpdate($category_id)
	{
		$sql="select * from  category where category_id=$category_id";
		$data=$this->conn->query($sql);
		$result=$data->fetch_assoc();
		
		return $result;
	}



	public function Dataupdate($data)
	{

		$category_name=$data['category_name'];
		$category_description=$data['category_description'];
		$parent_category=$data['parent_category'];
		$category_image=$data['category_image'];
		$category_id=$data['category_id'];

		$sql="UPDATE category SET category_name='$category_name' ,parent_category='$parent_category',category_image='$category_image',
		 category_description='$category_description' WHERE category_id=$category_id ";
		$data=$this->conn->query($sql);
		
	}

	public function getDataWithJoin() 
	{
		$sql = "
			SELECT c1.category_id, c1.category_name, c1.parent_category, c1.category_description, c1.category_image, c1.status, 
			c2.category_name AS parent_category_name
			FROM category c1
			INNER JOIN category c2 ON c1.parent_category = c2.category_id";
		
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

	public function Joinquery($parent_category)
	{
		$sql="SELECT c1.category_id, c1.category_name, c1.parent_category, c2.category_name AS parent_category_name FROM category c1 INNER JOIN category c2 ON c1.parent_category = c2.category_id;";
		$data=$this->conn->query($sql);
		$result=$data->fetch_assoc();
		return $result;

	}

	public function getCategories()
    {
        $query = 'SELECT c1.category_id, c1.category_name, c1.parent_category, c1.category_description, c1.category_image, c1.status, 
		c2.category_name AS parent_category_name FROM category c1 INNER JOIN category c2 ON c1.parent_category = c2.category_id;
		';

        $result = $this->mysqli->query($query);

        if (!$result) {
            die("Query failed: " . $this->mysqli->error);
        }

        return $result->fetch_assoc();
    }

	public function addjoincategory()
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
	public function duplicateCheck($data)
	{

		$category_name=$data['category_name'];
		$duplicateCheckSql = "SELECT COUNT(*) as count FROM category WHERE category_name = '$category_name'";
		$duplicateResult=$this->conn->query($duplicateCheckSql);
		$duplicateData = mysqli_fetch_assoc($duplicateResult);
		return $duplicateData;

	}
	

}

?>