<!DOCTYPE html> 
<html>
<head>
    <link rel="stylesheet" href="css/site.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head> 
<body>
    <?php 
        include 'templates/header.php'; 
        include 'templates/footer.php'; 
    ?> 
    <div>
    game page
        <?php 
        
         if (isset($_SESSION["username"])){
            echo "<p>user is logged in (games page)</p>";  
        }
        ?> 

    </div> 

</body> 
</html> 