<?php
class Database
{
	public $servername = 'localhost';
	public $username = 'root';
	public $password = '';
	public $dbname = 'admin_details';
	public $conn;
	public $result = [];
    public $mysqli;
	
	public function __construct() 
    {
        $this->conn = new mysqli(
			$this->servername,
			$this->username,
			$this->password,
			$this->dbname
		);

        if ($this->conn->connect_error) 
		{
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
	
	/**
	 * Get the data form the table
	 */
    public function getData(string $table,string $field='*', string $condition_arr='',string $order_by_field='',string $order_by_type='desc',string $limit='')
    {
		$sql="select $field from $table ";
		if($condition_arr!='')
		{
			$sql .= ' where ';
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val)
            {
				if($i==$c)
				{
					$sql.="$key='$val'";
				}
				else
				{
					$sql.="$key='$val' and ";
				}
				$i++;
			}
		}
		if($order_by_field!='')
		{
			$sql.=" order by $order_by_field $order_by_type ";
		}
		
		if($limit!='')
		{
			$sql.=" limit $limit ";
		}
		
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			$arr=array();
			while($row=$result->fetch_assoc())
			{
				$arr[]=$row;
			}
			return $arr;
		}
		else
		{
			return 0;
		}
	}
	/**
	 * insert the data into table
	 */
	public function insertData($table,$condition_arr)
	{
		if($condition_arr!='')
		{
			foreach($condition_arr as $key=>$val)
			{
				$fieldArr[]=$key;
				$valueArr[]=$val;
			}
			$field=implode(",",$fieldArr);
			$value=implode("','",$valueArr);
			$value="'".$value."'";			
			$sql="insert into $table($field) values($value) ";
			$result=$this->conn->query($sql);
		}
	}
	/**
	 * insert the multiple images into data
	 */
	public function insertmultipleimage($table,$condition_arr)
	{
		if($condition_arr!='')
		{
			foreach($condition_arr as $key=>$val)
			{
				$fieldArr[]=$key;
				$valueArr[]=$val;
			}
			$field=implode(",",$fieldArr);
			$value=implode("','",$valueArr);
			$value="'".$value."'";			
			$sql="insert into $table($field) values($value) ";
			$result=$this->conn->query($sql);
			
			$id=mysqli_insert_id($this->conn);
             return $id;

		}
	}
	/**
	 * delete the the data form the table
	 */
	
	 public function deleteData($table, $condition_arr)
	 {
		 if (!empty($condition_arr)) {
			 $sql = "DELETE FROM $table WHERE ";
			 $c = count($condition_arr);
			 $i = 1;
			 foreach ($condition_arr as $key => $val) {
				 if ($i == $c) {
					 $sql .= "$key = '$val'";
				 } else {
					 $sql .= "$key = '$val' AND ";
				 }
				 $i++;
			 }
			 $result = $this->conn->query($sql);
	 
			 if ($result) {
				 return true; // Query executed successfully
			 } else {
				 // Report the error
				 echo "Error: " . $this->conn->error;
				 return false;
			 }
		 }
	 }
	 
	/**
	 * update the the data of the table
	 */
	public function updateData( $table,$condition_arr, $where_field,$where_value)
	{
		if($condition_arr!='')
		{
			$sql="update $table set ";
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val)
			{
				if($i==$c)
				{
					$sql.="$key='$val'";
				}
				else
				{
					$sql.="$key='$val', ";
				}
				$i++;
			}
			$sql.=" where $where_field='$where_value' ";
			$result=$this->conn->query($sql);
		}
	}
	public function updateData123($table, $params = [], $where = null)
    {
        if ($this->tableExists($table)) {
            $args = [];
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'";
            }

            $sql = "UPDATE $table SET " . implode(", ", $args);

            if ($where != null) {
                $sql .= " WHERE $where";
            }

            $result = $this->conn->query($sql);

            if ($result) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push(
                    $this->result,
                );
                return false;
            }
        } else {
            array_push($this->result, "Table does not exist.");
            return false;
        }
    }
	public function updateData1( $table,$condition_arr1, $where_field,$where_value)
	{
		if($condition_arr1!='')
		{
			$sql="update $table set ";
			$c=count($condition_arr1);	
			$i=1;
			foreach($condition_arr1 as $key=>$val)
			{
				if($i==$c)
				{
					$sql.="$key='$val'";
				}
				else
				{
					$sql.="$key='$val', ";
				}
				$i++;
			}
			$sql.=" where $where_field='$where_value' ";
			$result=$this->conn->query($sql);
		}
	}
	/**
	 * get the string form the table
	 */
	public function get_safe_str($str)
	{
		if($str!='')
		{
			return mysqli_real_escape_string($this->conn,$str);
		}
	}
	
	public function tableExists($table)
{
    $sql = "SHOW TABLES FROM " . $this->dbname . " LIKE '$table' ";
    $tableInDb = $this->conn->query($sql);
    if ($tableInDb) {
        if ($tableInDb->num_rows == 1) {
            return true;
        } else {
            array_push($this->result, $table . " does not exist");
            return false;
        }
    }
}


}

$obj = new Databases($servername, $username, $password, $dbname);


define('BASE_URL', 'http://localhost/E-commerce/');
define('BASE_URL_IMAGE', BASE_URL.'images/');
define('BASE_URL_JS', BASE_URL.'js/');
?>