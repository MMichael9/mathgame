<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Math Game</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta charset="utf-8" />
</head>
<?php
    $email = $password = $error ="";
    $correct = $total = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
            $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["correct"] = $correct;
        $_SESSION["total"] = $total;
    
        if ($email == "a@a.a" && $password == "aaa"){
            header('Location: math.php');
        } else {
            $error = "Invalid login credentials.";
        }
    }
?>
<body>
    <div class="container"><div class="row">
    <div class="col-sm-10 col-sm-offset-1"><h1>Please login to enjoy our math game.</h1></div>
    <div class="col-sm-1"></div>
</div>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="post" role="form" class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-4 text-right">Email:</div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email);?>"placeholder="Email" size="6">
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 text-right">Password:</div>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($password);?>"placeholder="Password" size="6">
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-4">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>
    <div class = "text-center">
        <p style="color:red"><?php echo $error ?></p>
    </div>
</form>
<div class="row">
</div>
    </div>
</body>
</html>








<?php
ob_start();
session_start();
?>
    <?php
$correct = $_SESSION["correct"];
$total = $_SESSION["total"];
$leftNum = rand(0,20);
$operators = array('+','-');
$operator = $operators[rand(0,1)];
$rightNum = rand(0,20);
$error = "";
if ($operator == '+'){
    $actualAnswer = $leftNum + $rightNum;
} else {
    $actualAnswer = $leftNum - $rightNum;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $answer = $_POST["answer"];
    $theAnswer = $_POST["actualAnswer"];
    if ($answer == $theAnswer){
    $message = "Correct.";
    $correct = $correct + 1;
    $total = $total + 1;
}  else if(!is_numeric($_POST["answer"])){
        $message = "Please enter a number.";
    }
    else {
    $message = "Incorrect.";
    $total = $total + 1;
}
    $_SESSION["correct"] = $correct;
    $_SESSION["total"] = $total;
    
}
?>

        <!DOCTYPE HTML>
        <html lang="en">

        <head>
            <title>Math Game</title>
            <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
            <meta charset="utf-8" />
        </head>

        <body>
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="post" role="form" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            <h1>Math Game</h1></div>
                        <div class="col-sm-4"><a href="index.php" class="btn btn-default btn-sm">Logout</a></div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-sm-offset-3">
                            <?php echo $leftNum?>
                        </label>
                        <label class="col-sm-2">
                            <?php echo $operator?>
                        </label>
                        <label class="col-sm-2">
                            <?php echo $rightNum?>
                        </label>
                        <div class="col-sm-3"></div>
                    </div>

                    <input type="hidden" name="actualAnswer" value="<?php echo htmlspecialchars($actualAnswer);?>" />

                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-4">
                            <input type="text" class="form-control" id="answer" name="answer" value="<?php echo htmlspecialchars($answer);?>" placeholder="Enter answer" size="6">
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary btn-sm">
                                Submit</button>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
                <hr />
                <div class="text-center">
                    <p>
                        <?php echo $message ?>
                    </p>
                    <p>Your answer:
                        <?php echo $answer ?>
                    </p>
                    <p>Actual answer:
                        <?php echo $theAnswer ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">Score:
                        <?php echo $correct?> /
                            <?php echo $total?>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </body>

        </html>


















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
    $error ="";
    $correct = 0;
    $total = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["correct"] = $correct;
        $_SESSION["total"] = $total;
    
        if ($email == "math@game.game" && $password == "1536"){
            header('Location: game.php');
        } else {
            $error = "Incorrect username or password";
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
        <form action="index.php" class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Email: </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo ($email);?>" placeholder="Enter your email address">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Password: </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo ($password);?>" placeholder="Enter your password">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default pull-left"/>
                <input type="reset" class="btn btn-default pull-right" value = "Clear Form"/>
              </div>
            </div>
            <div>
                <p><?php echo $error ?></p>
            </div>
        </form>
        </div>
    </body>
</html>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Michael Minhas | A00961026</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div>
            <div>
                <h2 style="text-align:center;">Math Game</h2>
            </div>
        </div>
        <div class="container">
        <form class="form-horizontal">
            <div class="row">
                <label class="col-sm-2 col-sm-offset-3">NUM</label>
                <label class="col-sm-2">+/-</label>
                <label class="col-sm-2">NUM</label>
                <div class="col-sm-3"></div>
            </div>
            
            <input type="hidden" name="first_number" value="15">
            <input type="hidden" name="operation" value="+">
            <input type="hidden" name="second_number" value="5">
            <input type="hidden" name="total" value="0">
            <input type="hidden" name="score" value="0">
            
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-4">
                    <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" size="6">
                </div>
                <div class="col-sm-5"></div>
            </div>
            
            <div class="row">
                <div class="col-sm-3 col-sm-offset-4">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary btn-sm">
                    Submit</button>
                </div>
                <div class="col-sm-3"></div>
            </div>
            
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4"></div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">Score: 0 / 0</div>
                <div class="col-sm-4"></div>
            </div>
        </form>
        </div>
    </body>
</html>