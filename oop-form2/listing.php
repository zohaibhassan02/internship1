<?php 
   
 include_once ("crud.php"); 
    
  if(!empty($_GET['delid'])) 
  { 
   
  $id=$_GET['delid']; 
   
  $crud= new crud(); 
  $crud->deletedata("form",$id); 
  header('location:listing.php'); 
  } 
    
  ?> 
    
  <!DOCTYPE html> 
  <html lang="en"> 
  <head> 
    <title>Listing</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  </head> 
  <body> 
    
  <div class="container"> 
        
    <table class="table table-striped"> 
      <thead> 
        <tr> 
          <th>Name</th> 
          <th>Mobile</th> 
          <th>Email</th> 
                          <th>Edit</th> 
                          <th>delete</th> 
        </tr> 
      </thead> 
      <tbody> 
              <?php 
    $crud= new crud(); 
     $result = $crud->selectalldata("form"); 
     
              while($data = mysqli_fetch_array($result)) 
              { 
              ?> 
              
        <tr> 
          <td><?php echo $data['name']; ?></td> 
          <td><?php echo $data['phone']; ?></td> 
          <td><?php echo $data['email']; ?></td> 
          <td><a href="edit.php?editid=<?php echo $data['id'];?>">edit</td> 
          <td><a href="listing.php?delid=<?php echo $data['id'];?>" onclick=" return confirm('Do You really want to delete this data')">delete</td> 
        </tr> 
              <?php } ?> 
      </tbody> 
    </table> 
  </div> 
    
  </body> 
  </html> 