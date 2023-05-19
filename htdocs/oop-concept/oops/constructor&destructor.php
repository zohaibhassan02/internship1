 <?php 
 
class class1{
	
	function __construct($y){
		
		$this->x=$y;
		
	}
	
	function fun1(){
		
		 echo $this->x;
	}
	
	function __destruct(){
		
		echo "ends";
	}
	
}

$obj1 = new class1(20);//instantiating the class1 or creating object using class1 or we are passing the value into this because we want to call it from construction which by defualt runs on just creatoin of object 
//note: as we instantiate the class we get the consstructor and desctructor 
//in output as but const.. and desctruc.. call by defualt on just creating the objet but 
// when we wan to call fun1 now we have to create call it with the help of object 

$obj1->fun1();//instantiating the fun1
//what is constructor and desctructor 
//constructor is a function which is called by default on calling of object and end with desctructor
 ?>