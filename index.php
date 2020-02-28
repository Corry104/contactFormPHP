<?php
    // Messahe Vars
    $msg ='';
    $msgClass ='';
    // Check For Submit
    if(filter_has_var(INPUT_POST, 'submit')){
        // Get Data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Check For Required Fields
        if(!empty($name) && !empty($email) && !empty($message) ){
            // Passed
            echo 'Passed';

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
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
                </div>
                <div class="form-group">
                    <!-- User Email Adress -->
                    <label>Email address</label>
                    <input type="text" name="email" class="form-control" value="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <!-- User Message -->
                    <label>Message</label>
                    <textarea name="message" class="form-control"></textarea>
                </div>
                <br>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- End Contact Form -->
        </div>
        <!-- Footer -->
        <footer class="navbar navbar-expand-lg navbar-dark bg-primary" style='color: FFFFFF; position:fixed; bottom:0; width:100%; height:50px; display:inline-block; text-align:center;'> Corrado Alfano - Software Developer </footer>
    </body>
</html>
