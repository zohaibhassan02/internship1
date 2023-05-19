<?php 
include 'mymodel.php';
/**
 * 1:Items_model 
 *
 * @author Madhuranga Senadheera
 * @copyright 2016
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 */
class Items_model extends MY_Model
{
/*********************Construct()******************************/
	function __construct()
    {
    	parent::__construct();

    	$this->_table_name = "items";
    }



    
}// End Items_model --------------Class{} 
 ?>