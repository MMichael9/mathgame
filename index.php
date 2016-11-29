<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Michael Minhas | A00961026</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <?php
    $email = "";
    $password = "";
    $invalid ="";
    $score = 0;
    $questions = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
    
        if ($email == "a@a.a" && $password == "aaa"){
            header('Location: game.php'); die();
        } else {
            $invalid = "Incorrect username or password";
        }
    }
    ?>
    <body>
        <div>
            <div>
                <h2 style="text-align:center;">Please login to enjoy our math game.</h2>
            </div>
        </div>
        <div class="container">
        <form action="index.php" method="post" class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Email: </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo ($email);?>" placeholder="Enter your email address">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Password: </label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" value="<?php echo ($password);?>" placeholder="Enter your password">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default pull-left"/>
                <input type="reset" class="btn btn-default pull-right" value = "Clear Form"/>
              </div>
            </div>
            <div>
                <p style="color:red;"><?php echo $invalid ?></p>
            </div>
        </form>
        </div>
    </body>
</html>