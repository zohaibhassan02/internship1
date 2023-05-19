<?php
//interface supports multiple inheritance 
//interface can only contain abstract function 
//in interface we can not define variables 
//no construct in interface 
//all function must be public 

interface class1{
	
	public function fun1 ();//if we are declaring function in interface class it has to be define in child class 
	
}
interface class2{
	
	public function fun2 ();//if we are declaring function in interface class it has to be define in child class 
	
}

/*class class3 extends class1{}*///this will give error as extend keyword 
//does not work with interface keyword so ..

class class3 implements class1,class2{
	
	public function fun1(){
		echo "test1";
		
	}
	public function fun2(){
		echo "test2";
		
	}
	

	
}

$obj = new class3();
$obj->fun2();

//we cannot instantiate a interface class such as below 
$obj = new class1();
 
//implements keyword has to use 

/*class class3 {}*/


?>