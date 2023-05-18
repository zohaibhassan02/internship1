<?php

include('database.php');

$obj = new query();
$condition_arr= array('name'=>'shweta','email'=>'xyz@gmail.com');

//$result = $obj->insertData('user',$condition_arr);
//$result = $obj->getData('user','*','','','id','',7);

//$result = $obj->deleteData('user',$condition_arr);
$result = $obj->updateData('user',$condition_arr,'id',2);
echo '<pre>';
print_r ($result);
?>