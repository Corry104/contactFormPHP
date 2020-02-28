<?php
    // Check For Submit
    if(filter_has_var(input_post, 'submit')){
        echo 'Submitted';
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class= "container">
                <div class="navbar-header">
                    <a class = "navbar-brand" href="index.php">
                        My Contact Form
                    </a>
                </div>
            </div>
        </nav>
        <div class="container">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                 <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="text" name="email" class="form-control" value="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Message</label>
                <textarea name="message" class="form-control"></textarea>
                <br>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
