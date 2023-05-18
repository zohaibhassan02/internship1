<?php 

//abstract class contains atlease 1 abstract function 
//abstraction class may have another function but along with atleast 1 abstract function 
//abstract function must declare but not implplement
//abstract class could not create object 
//abstract class child class must contain abstract function 

//why we use abstract class 

abstract class bank{
	abstract function id_proff();//abstract declare function 
	function xyz(){//norma function 
		
	}
	
}
class hdfc extends bank{
	function test(){
		echo "test"
	}
}
//hdfc class inherit the bank which means it has to create abstract function id_proff as it is compulosry in parent class to declare the fucntion 
class icici extends bank{
	function test(){
		echo "test"
	}
}


?>