 <?php 
 
class class1{
		public $x = 1;  //instance member variable 
		function fun1(){   //instance memeber function 
			return $this->x++;        //we cannot acces this varibale in this function directly we have to use this vairiable caller varible to access it 
			
		}
//this represents the current instance that is here is obj	
	
	
}

$obj1 = new class1();//instantiating the class1 or creating object using class1
$obj2 = new class1();

$obj1->fun1();//calling the function of class 1 here i.e fun1
echo $obj1->x;
echo "<br>";
echo $obj2->x;//here we are printig the direct value of x i.e 1 without calling the function 

//hence here is one function behaving in different way 
 ?>