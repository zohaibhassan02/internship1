<?php 
include '../db.php';
/**
 * 1:mymodel 
 *
 * @author Madhuranga Senadheera
 * @copyright 2016
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 */
class My_model
{
	protected $_table_name;
	protected $db_conn;
	/*********************Construct()******************************/
	function __construct()
    { 
    	$db = new Db();
    	$this->db_conn = $db->connect();

    }


     /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable 						: type
     * @return 							return_type 
     */
    public function get_all()
    {
    	 
    	$sql = "SELECT * FROM ".$this->_table_name; 
    	$result = mysqli_query($this->db_conn,$sql);
    	$temp_array =  array();

    	// check query has rows
    	if (mysqli_num_rows($result) > 0)
    	{
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result))
		    { 
		    	array_push($temp_array,$row); 
		    }
            return $temp_array;
		} 
		else
		{
		    return FALSE;
		}
    }
    /*---------------End of get_all()---------------*/
    
}// End My_model --------------Class{} 
 ?>