<?php
    // Message Vars
    $msg ='';
    $msgClass ='';
    // Check For Submit
    if(filter_has_var(INPUT_POST, 'submit')){
        // Get Data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Check For Required Fields
        if(!empty($name) && !empty($email) && !empty($message) ){
            // Passed
            //
            // Check Email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                // Failed
                $msg = 'Please use a valid email address';
                $msgClass = 'alert-danger';
            } else {
                // Passed
                //
                // Recipient Email
                $toEmail = 'corrado.alfano10@gmail.com';
                $subject = 'Contact Request From ' .$name;
                $body = '<h2>Contact Request</h2>
                         <h4>Name</h4><p>'.$name.'</p>
                         <h4>Name</h4><p>'.$email.'</p>
                         <h4>Name</h4><p>'.$message.'</p>
                        ';
                //
                // Email Headers
                $headers = "MIME-Version: 1.0" ."\r\n";
                // .= means appending onto the existing variable, it will not replace variable value, it will add to it!
                $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
                //
                // Additional Headers
                // // .= means appending onto the existing variable, it will not replace variable value, it will add to it!
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                if(mail($toEmail, $subject, $body, $headers)) {
                    // Email Sent
                    //
                    $msg = "Your email has been sent successfully!";
                    $msgClass = "alert-success";
                } else {
                    // Failed
                    //
                    $msg = "Unfortunately, your email did not go through!";
                    $msgClass = "alert-danger";
                }
            }
        } else {
            // Failed
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrinktofit=no">
        <title>Contact Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <!-- Navbar created using bootstrap  -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class= "container">
                <div class="navbar-header">
                    <a class = "navbar-brand" href="index.php">
                        My Contact Form
                    </a>
                </div>
            </div>
        </nav>
        <!-- Beginning of Contact Form -->
        <div class="container">
            <?php if($msg != ''):?>
                <div class='alert <?php echo $msgClass; ?>'>
                    <?php echo $msg;?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                 <div class="form-group">
                     <!-- User Name -->
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
                </div>
                <div class="form-group">
                    <!-- User Email Address -->
                    <label>Email Address</label>
                    <input type="text" name="email" class="form-control" value="<?php echo isset($email) ? $email : ''; ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <!-- User Message -->
                    <label>Message</label>
                    <textarea name="message" class="form-control"><?php echo isset($message) ? $message : ''; ?></textarea>
                </div>
                <br>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- End Contact Form -->
        </div>
        <!-- Footer -->
        <footer class="navbar navbar-expand-lg navbar-dark bg-primary" style='color: #FFFFFF; position:fixed; bottom:0; width:100%; height:50px; display:inline-block; text-align:center;'> Corrado Alfano - Software Developer </footer>
    </body>
</html>
