<?php 
   
 include_once ("classes/crud.php"); 
   
 $id = $_GET['editid']; 
   
 $crud= new crud(); 
   
 $data = $crud->selectbyid('form',$id); 
   
 if(isset($_POST['submit'])) 
 { 
             $data= array( 
             
                 "name"  => $crud->escape_string($_POST['name']),            
                         "email"  => $crud->escape_string($_POST['email']), 
                                                 "phone"  => $crud->escape_string($_POST['phone']) 
             
             ); 
             
             
               $crud->update($data,'form',$id); 
             
             
             if($data) 
             { 
             echo 'updated successfully'; 
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
 <title>Edit in oops</title> 
 <link rel="stylesheet" type="text/css" href="css/style.css"> 
 <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 
 </head> 
 <body> 
   
   
 <form method="POST" name="form"> 
   
 <label>name</label> 
 <input type="text" name="name" value="<?php echo $data['name'];?>"><br/> 
   
 <label>email</label> 
 <input type="text" name="email" value="<?php echo $data['email'];?>"><br/> 
   
 <label>phone</label> 
 <input type="text" name="phone" value="<?php echo $data['phone'];?>"><br/> 
   
 <input type="submit" name="submit"> 
   
 </form> 
 </body> 
 </html> 