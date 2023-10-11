<?php
class databases
{
	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;
	
	protected function connect()
	{
		$this->host='localhost';
		$this->dbusername='root';
		$this->dbpassword='';
		$this->dbname='admin_details';
		$con=new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
		return $con;
	}
}

class query extends databases
{
	public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='desc',$limit=''){
		$sql="select $field from $table ";
		if($condition_arr!='')
		{
			$sql.=' where ';
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val){
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
		
		$result=$this->connect()->query($sql);
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
			$result=$this->connect()->query($sql);
		}
	}
	
	public function deleteData($table,$condition_arr)
	{
		if($condition_arr!='')
		{
			$sql="delete from $table where ";
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
			$result=$this->connect()->query($sql);
		}
	}
	
	public function updateData($table,$condition_arr,$where_field,$where_value)
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
			$result=$this->connect()->query($sql);
		}
	}
	
	public function get_safe_str($str)
	{
		if($str!='')
		{
			return mysqli_real_escape_string($this->connect(),$str);
		}
	}

	public function showDataUpdate($category_id)
	{
		$sql="select * from  category where category_id=$category_id";
		$data=$this->connect()->query($sql);
		$result=$data->fetch_assoc();
		
		return $result;
		
		
	}

	public function Dataupdate($data){

		$category_name=$data['category_name'];
		$category_description=$data['category_description'];
		$parent_category=$data['parent_category'];
		$category_image=$data['category_image'];
		$category_id=$data['category_id'];

		$sql="UPDATE category SET category_name='$category_name' ,parent_category='$parent_category',category_image='$category_image',
		 category_description='$category_description' WHERE category_id=$category_id ";
		$data=$this->connect()->query($sql);
		
	}

	public function Joinquery($parent_category){
		$sql="SELECT c1.category_id, c1.category_name, c1.parent_category, c2.category_name AS parent_category_name FROM category c1 INNER JOIN category c2 ON c1.parent_category = c2.category_id;";
		$data=$this->connect()->query($sql);
		$result=$data->fetch_assoc();

		return $result;


	}
}

?>