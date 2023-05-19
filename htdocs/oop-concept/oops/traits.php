<?php 
/*trait class1{
	function fun1(){
		echo "fun1";
	}
}
class class2 {
	use class1;//to use the feature of class1 we  will use this keywork 
	function fun2(){
		echo "fun12";
	}
}
class class3 extends class2{
	function fun3(){
		echo "fun3";
	}
}

class class4 extends class3{
	function fun4(){
		echo "fun4";
	}
}

$obj = new class2();
echo $obj->fun1();
// the problem is here every child class containg feature if of 
//parent class but as u can see here class 3 easily  access fun1 of class1
//so to avoid it we will use trait in class 1 
*/
trait t1{
	function fun1(){
		echo "t1:fun1";
	}
}
trait t2{
	function fun1(){
		echo "t2:fun2";
	}
}
trait t3{
	function fun1(){
		echo "t1:fun3";
	}
}
trait t4{
	function fun1(){
		echo "t1:fun4";
	}
}
class class1{
	use t1,t2{//no priority will be given to this as we are creating function in this class i.e23
	t1::fun1 insteadof t2;
	t2::fun1 as fun2;
	}
	/*function fun23(){
		echo "class:fun23";
	}*/
}

$obj = new class1();
$obj->fun2();
?>