<?php

class Cart
{
	/*********************Construct()******************************/
	function __construct()
    { 
    	if (!isset($_SESSION))
        {
            session_start();
        }
    }


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable 						: type
     * @return 							return_type 
     */
    public function add($new_item=null)
    {
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'][0] = $new_item;
            return TRUE;
        } 
        array_push($_SESSION['items'], $new_item);  
        return TRUE;

    }
    /*---------------End of add($item=null)---------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable 						: type
     * @return 							return_type 
     */
    public function remove($id=null)
    { 
        if ($_SESSION['items'][$id]) {  
            unset($_SESSION['items'][$id]); 
            return TRUE;
        }   
        return FALSE;      
    }
    /*---------------End of remove($id=null)---------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable 						: type
     * @return 							return_type 
     */
    public function clear_all()
    {
        if (isset($_SESSION['items'])) {
    	   unset($_SESSION['items']); 
            return TRUE;
        }
        return FALSE;
    }
    /*---------------End of clear_all()---------------*/
    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable                         : type
     * @return                             return_type 
     */
    public function get_all()
    {
        return $_SESSION['items'];
    }
    /*---------------End of get_all()---------------*/
    
    
}// End Cart --------------Class{}
//Owner : Madhuranga Senadheera

?>