 <?php
class class1{
	static public $num=10;
	public $num2=20;
static function fun1(){
	echo self::$num;
	//echo $this->num2;//this part is not going to use when function is static 
}	//this keyword is used for the current object instantiiate 
}	

//$obj = new class1();
//echo $obj->num;

//$obj->fun1();
echo class1::fun1();
//instantiating the static object 
//note: a satic function can only static variable 
  
 ?>