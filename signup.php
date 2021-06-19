


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

<div class="container body-content">

    <div class="row registerHeader">
        <div class="registerHeading">
            <h1>Register</h1>
        </div>
    </div>
    <div class="row register">
        <div class="col-md-12">
            <form action="signup.inc.php" method="POST"> 
                <div class="form-group">
                    <label>Username</label></br>
                    <input class="form-control" type="text" name="user_name" placeholder="username"> 
                </div> 
                <div class="form-group">
                    <label>Email</label></br>
                    <input class="form-control" type="text" name="user_email" placeholder="email"> 
                </div> 
                
                <div class="form-group">
                    <label>Password</label><br>
                    <input class="form-control" type="password" name="user_pwd" placeholder="password"> 
                </div> 
                <div class="form-group">
                    <label>Confirm Password</label></br>
                    <input class="form-control" type="password" name="user_pwdrepeat" placeholder="confirm password"> 
                </div> 
                <?php 
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p class='error'>Fill all the fields!</p>"; 
            }
            else if ($_GET["error"] == "invalidusername"){
                echo "<p class='error'>Enter valid username!</p>"; 
            }
            else if ($_GET["error"] == "invalidemail"){
                echo "<p class='error'>Enter valid email!</p>"; 
            }
            else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p class='error'>Passwords do not match!</p>"; 
            }
           else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p class='error'>Passwords do not match!</p>"; 
            }
            else if ($_GET["error"] == "passwordtooshort"){
                echo "<p class='error'>Password is too short!</p>"; 
            }
            else if ($_GET["error"] == "none"){
                echo "<p class='error'>You have signed up!</p>"; 
            }
        }
    ?>
                <button type="submit" name="submit" class="btn btn-primary">Sign Up</button> 
               

            </form> 

        </div>
    </div>
</div>
</body> 

<?php include 'templates/footer.php'?> 
</html> 




