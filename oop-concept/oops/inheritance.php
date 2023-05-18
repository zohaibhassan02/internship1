<?php

class class1{
	
	function __construct (){
		
		echo "this is constructor";
	}
	
	function fun1 (){
		echo "this is function 1";
	}
}

//$obj = new class1();


class  class2 extends class1{
	
	function __construct (){
		
		echo "this is constructor2";
		parent::__construct();
	}
	
	function fun1 (){
		echo "this is function 2";
	}
	
}
 $obj2 = new class2();
 $obj2->fun1();
 

?>