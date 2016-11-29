<!DOCTYPE html>
<html lang="en">

<head>
    <title>Math Login</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta charset="utf-8" />
</head>

<?php
session_start(); 
$incorrect = "";
$answer = 0;
$counter = 0;
$score = 0;
    
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $valid = true;
    if (!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }
    if (!isset($_SESSION['counter'])){
        $_SESSION['counter'] = 0;
    }
    if ($_SESSION['sign'] == "+") {
        $answer = $_SESSION['numOne'] + $_SESSION['numTwo'];
    } else {
        $answer = $_SESSION['numOne'] - $_SESSION['numTwo'];
    }
    if (!is_numeric($_POST['answer'])) {
        $incorrect = "You must enter a number";
    } else {
        if ($_POST['answer'] != $answer) {
            $incorrect = "Sorry, you are incorrect";
            $valid = false;
        }
        if ($_POST['answer'] == $answer){
            $incorrect = "Good Job, You are correct";
            
            $score = $_SESSION['score'];
            $score++;
            $_SESSION['score'] = $score;
        }
    
        $counter = $_SESSION['counter'];
        $counter++;
        $_SESSION['counter'] = $counter;
    }
}
    ?>


    <body>
        <div class="col-sm-6 col-sm-offset-4">
            <h1>Math Game</h1>
            <br />
        </div>
        <form class="form-horizontal" role="form" method="get" name="logout" id="logout" action="index.php">
            <div class="form-group">
                <div class="col-sm-2">
                    <input type='submit' name='Submit' class="btn btn-primary" value='Log out' />
                </div>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="post" name="test" id="test" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group" name="numOne">
                <div class="col-sm-3 col-sm-offset-2">
                    <?php  $numOne = rand(0,20);
                        $_SESSION['numOne'] = $numOne;
                        echo($numOne); ?>
                </div>
                <div class="col-sm-3">
                    <?php $int = rand(0,1);
                        $sign = "+-";
                        $rand_sign = $sign[$int];
                        $_SESSION['sign'] = $rand_sign;
                        echo $rand_sign; ?>
                </div>
                <div class="col-sm-3" name="numTwo">
                    <?php $numTwo = rand(0,20);
                        $_SESSION['numTwo'] = $numTwo;
                        echo($numTwo); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="answer" class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input type='text' name='answer' class="form-control" id='answer' maxlength="50" size = "6" placeholder="Enter Answer" />
                    <span style="color:red;"><?php echo $incorrect;?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type='submit' name='Submit' class="btn btn-primary" value='Submit' />
                </div>
            </div>
            <hr />
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6 ">
                    <p>Score <?php if (isset($_SESSION['score'])) { 
                                        echo $_SESSION['score']; 
                                    } else { 
                                        echo 0; 
                                    } ?> 
                                    / 
                                <?php if (isset($_SESSION['counter'])) { 
                                        echo $_SESSION['counter']; 
                                    } else { 
                                        echo 0;
                                    } 
                        ?> </p>
                </div>
            </div>
        </form>
    </body>

</html>