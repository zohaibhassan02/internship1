<?php
class database{
	
	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;
	
	
	protected function connect() {
	
	$this->host='localhost';
	$this->dbusername='techiemonk_user';
	$this->dbpassword='Techi#123';
	$this->dbname='techiemonk_db';
	$con  = new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
	return $con;
	
}
	
}




class query extends database{
	public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='desc',$limit=''){
		$sql = "select $field from $table";
		
		if($condition_arr!=''){
			$sql.=' where ';
			$c = count($condition_arr);
			$i =1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
				$sql.=" $key='$val' ";
				}
				else{
					$sql.=" $key='$val' and ";
				}
				$i++;
			}
		}
		if($order_by_field!=''){
			$sql.= " order by $order_by_field $order_by_type";
		}
		
		if($limit!=''){
			$sql.= " limit $limit";
		}
		//die($sql);
		
		$result= $this->connect()->query($sql);//passed two function together 
		if($result->num_rows>0){
			$arr  = array();
			while($row= $result->fetch_assoc()){
				$arr[] = $row;

				}
				return $arr;
		}else{
			return 0;
		}
	}
	
	
	
	public function insertData($table,$condition_arr=''){
		
		if($condition_arr!=''){
			foreach($condition_arr as $key=>$val){
				$fieldArr[]=$key;
				$valuedArr[]=$val;
				
				
			}
			$field=implode(",",$fieldArr);//converted field to string 
			$value=implode("','",$valuedArr);
			$value = "'".$value."'";//giving appostrophy here 
			
			
			$sql ="insert into $table($field) values ($value)";
			
			$result= $this->connect()->query($sql);
			
			
		}
	}
	
	
	public function deleteData($table,$condition_arr=''){
		
		if($condition_arr!=''){
			
			$sql = "delete from $table where ";
			$c = count($condition_arr);
			$i =1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
				$sql.=" $key='$val' ";
				}
				else{
					$sql.=" $key='$val' and ";
				}
				$i++;
			}
			//echo $sql;
			
			$result= $this->connect()->query($sql);
			
			
		}
	}
	
	
	public function updateData($table,$condition_arr='',$where_field,$where_value){
		
		if($condition_arr!=''){
			
			$sql = "update $table set ";
			$c = count($condition_arr);
			$i =1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
				$sql.=" $key='$val' ";
				}
				else{
					$sql.=" $key='$val' , ";
				}
				$i++;
			}
			$sql.="where $where_field ='$where_value'";
			//echo $sql;
			//echo $sql;
			
			$result= $this->connect()->query($sql);
			
			
		}
	}
	
		public function get_safe_str($str){
			
			if($str!=''){
			
			return mysqli_real_escape_string($this->connect(),$str);
			}
		}		
		
}


/*
select $field from $table where $condition like $like order by $order_by_field $order_by_type limit $limit


*/


?>