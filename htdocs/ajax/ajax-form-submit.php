<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form Submission and Validation Using Ajax and jQuery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script> 

</head>
<body>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>PHP MySQL Form Submit using jQuery and Ajax With Validation</h2>
            </div>

            <span id="err-msg" style="display: none"></span>

                <form action="javascript:void(0)" method="post" id="php-ajax-form">
                    <!-- stops the page from reloading -->
 
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" value="" maxlength="50" >
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" value="" maxlength="50" >
                    </div>
 
                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="" maxlength="30" >
                    </div>

                    <div class="form-group ">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="" maxlength="30" >
                    </div>
 
                    <input type="submit" class="btn btn-primary" name="submit" value="submit">
                    <button><a href="login.php">Login</a></button>
             
                </form>
        </div>
    </div>        
</div>
<script type="text/javascript">
 $(document).ready(function($){
 
    // on submit...
    $('#php-ajax-form').submit(function(e){
 
        e.preventDefault();
        //It prevents a submit button from submitting a form
 
 
        $("#err-msg").hide();
 
        //name required
        var fname = $("input#fname").val();
        if(fname == ""){
            $("#err-msg").fadeIn().text("First Name required.");
            $("input#fname").focus();
            return false;
        }
 
        // last name
        var lname = $("input#lname").val();
        if(lname == ""){
            $("#err-msg").fadeIn().text("Last Name required");
            $("input#lname").focus();
            return false;
        }

        // email required
        var email = $("input#email").val();
        if(email == ""){
            $("#err-msg").fadeIn().text("Email required");
            $("input#email").focus();
            return false;
        }

        var password = $("input#password").val();
        if(password == ""){
            $("#err-msg").fadeIn().text("Password required");
            $("input#password").focus();
            return false;
        }
 
 
        // ajax
        $.ajax({
            type:"POST",
            url: "ajax-insert-data.php",
            data: $(this).serialize(), // get all form field value in serialize form 
/* The serialize() method creates a URL encoded text string by serializing form values.

You can select one or more form elements (like input and/or text area), or the form element itself.

The serialized values can be used in the URL query string when making an AJAX request. */
            success: function(data){
                if(data ==1){
                    alert('Form Has been submitted successfully using ajax in PHP. Click on the login button and log in.');
                }
                else if(data == 0){
                    alert('user already exists');
                }
              
                else{
                    alert(data);
                }
            }
        });
    });  
 
    return false;
    });
</script>
</body>
</html>