<!DOCTYPE html> 
<html> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php include_once 'connection.inc.php' ?>
<head> 
    
</head> 
<body> 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php 
    include 'templates/header.php'; 
    include 'templates/footer.php'; 
?>

    <form action="signup.inc.php" method="POST"> 
        <input type="text" name="user_name" placeholder="username"> <br> 
        <input type="text" name="user_email" placeholder="email"> <br> 
        <input type="password" name="user_pwd" placeholder="password"> <br> 
        <input type="password" name="user_pwdrepeat" placeholder="confirm password"> <br> 
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button> 
    </form> 

    <?php 
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill all the fields!</p>"; 
            }
            else if ($_GET["error"] == "invalidusername"){
                echo "<p>Enter valid username!</p>"; 
            }
            else if ($_GET["error"] == "invalidemail"){
                echo "<p>Enter valid email!</p>"; 
            }
            else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords do not match!</p>"; 
            }
           else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords do not match!</p>"; 
            }
            else if ($_GET["error"] == "passwordtooshort"){
                echo "<p>Password is too short!</p>"; 
            }
            else if ($_GET["error"] == "none"){
                echo "<p>You have signed up!</p>"; 
            }
        }
    ?>


</body> 

<?php include 'templates/footer.php'?> 
</html> 




