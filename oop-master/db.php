<?php 
class Db
{
	protected $conn;
	protected $servername;
	protected $username;
	protected $password;
	protected $dbname;
	/*********************Construct()******************************/
	function __construct()
    {
    	$this->servername = "127.0.0.1";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "oop_db";

    }


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable 						: type
     * @return 							return_type 
     */
    public function connect()
    {
    	// Create connection
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $this->conn->connect_error);
		}
		else
		{
			return $this->conn; 
		}
    }
    /*---------------End of connect()---------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable 						: type
     * @return 							return_type 
     */
    public function close()
    { 
    	return $this->conn->close();
    }
    /*---------------End of disconnect()---------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable                         : type
     * @return                             return_type 
     */
    public function get_all()
    {
        
    }
    /*---------------End of get_all()---------------*/
    
}// End Db --------------Class{}

//Owner : Madhuranga Senadheera

?>