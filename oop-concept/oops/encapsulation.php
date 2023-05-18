<?php
class class1{
	private $num;
	function __construct(){
		
		$this->num=1;
	}
	protected function getData(){
		
		echo "hello from class1";
	}
	/*function getNum(){
		
		return $this->num;
	}*/
}


/*$obj = new class1();

echo $obj->getNum();  //since here we cannot get the num value as it is protected property above 
//so to get the value of num we have to uase getter and setter function 

*/
//closing above for class 2 for understanding access modifier 
/*there are three access modifier
public it is bydefault access modifier if we define a variable without access modifier it measn it is public 
private :  within a class only cant acces outside the class 
protected: access within a class or in extend(inheritance) classes 

*/

class class2 extends class1{
	
	/*function getData(){
		
		echo "hello from class2";
	}*/		
	
}

$obj = new class2();
echo $obj->getData();
?>

