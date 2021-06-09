<!DOCTYPE html> 
<html> 
    
    <?php include_once 'connection.inc.php' ?>
<head> 
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="lib/jquery-validation/dist/jquery.validate.js"></script>
    <script src="lib/jquery-validation-unobtrusive/jquery.validate.unobtrusive.js"></script>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/site.css?v=<?php echo time(); ?>">
</head> 
<body> 
   <?php 
    include 'templates/header.php'; 
    include 'templates/footer.php'; 
   ?> 
<div class="container body-content">

    <div class="row sectionHeader">
        <div class="sectionHeading">
            <h1>Login</h1>
        </div>
    </div>
    <div class="row register">
        <div class="col-md-12">
            <form action="login.inc.php" method="POST"> 
                <div class="form-group">
                    <label>Username/Email</label>
                    <input class="form-control" type="text" name="user_name" placeholder="username/email">
                </div> 
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="user_pwd" placeholder="password">
                </div> 
                <?php 
                    if (isset($_GET["error"])){
                        if ($_GET["error"] == "emptyinput"){
                            echo "<p class='error'>Fill all the fields!</p>"; 
                        }
                        else if ($_GET["error"] == "wronglogin"){
                            echo "<p class='error'>Incorrect login!</p>"; 
                        }
                        else if ($_GET["error"] == "none"){
                            echo "<p class='error'>You have logged in!</p>"; 
                        }
                    }           
                ?>
                <button type="submit" name="submit" class="btn btn-primary">Login</button> 
            </form> 
        </div>
    </div>
</div>




</body> 

<?php include 'templates/footer.php'?> 
</html> 



