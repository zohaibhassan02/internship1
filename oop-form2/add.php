<?php 
   
 include_once ("crud.php"); 
   
 $crud= new crud(); 
   
 if(isset($_POST['submit'])) 
 { 
             $data= array( 
             
                 "name"  => $crud->escape_string($_POST['name']),            
                         "email"  => $crud->escape_string($_POST['email']), 
                                                 "phone"  => $crud->escape_string($_POST['phone']) 
             
             ); 
             
             
               $crud->insert($data,'form'); 
             
             
             if($data) 
             { 
             echo 'insert successfully'; 
             header('location:listing.php'); 
             } 
             
 else 
             { 
             echo 'try again' ; 
             } 
             
             
 } 
   
   
 ?> 
 <!DOCTYPE html> 
 <html> 
 <head> 
 <title>add in oops</title> 
 <link rel="stylesheet" type="text/css" href="css/style.css"> 
 <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 
 </head> 
 <body> 
   
   
 <form method="POST" name="form"> 
   
 <label>name</label> 
 <input type="text" name="name"><br/> 
   
 <label>email</label> 
 <input type="text" name="email"><br/> 
   
 <label>phone</label> 
 <input type="text" name="phone"><br/> 
   
 <input type="submit" name="submit"> 
   
 </form> 
 </body> 
 </html> 