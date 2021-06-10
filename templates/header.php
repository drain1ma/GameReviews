<?php 
    session_start(); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/site.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="lib/jquery-validation/dist/jquery.validate.js"></script>
    <script src="lib/jquery-validation-unobtrusive/jquery.validate.unobtrusive.js"></script>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
</head>

<body> 
<header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-5" style="background-color: #999999">
            <div class="container">
    
                
                <div class="logo" href="index.php"></div>

                <div class="navbar-collapse collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="list-item nav-link" href="index.php"> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-item nav-link" href="games.php"> Games
                            </a>
                            
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav ml-auto">
                            <?php 
                                if (isset($_SESSION["username"])){
                                    echo "<li class='nav-item'><a class='list-item nav-link' href='profile.php'>Profile</a></li>";  
                                    echo "<li class='nav-item'><a class='list-item nav-link' href='logout.inc.php'>Logout</a></li>";  
                                }
                                else{
                                    echo "<li class='nav-item'><a class='list-item nav-link' href='signup.php'>Register</a></li>";  
                                    echo "<li class='nav-item'><a class='list-item nav-link' href='login.php'>Login</a></li>";  
                                }
                            ?> 
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</body> 
</html> 
