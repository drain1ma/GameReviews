
<!DOCTYPE html> 
<html>
<head>
</head> 
<?php
    include 'templates/header.php'; 
    include 'templates/footer.php'; 
?>

<body> 
    <?php 
       if (isset($_SESSION["username"])){
        echo "<p>user is logged in</p>";  
    }
    
    ?> 
</body> 
</html> 