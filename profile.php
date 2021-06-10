<?php
    include_once 'dbh.php'; 
?> 
<!DOCTYPE html> 
<html>
<head>
</head> 
<?php
    include 'templates/header.php'; 
    include 'templates/footer.php'; 


?>

<body> 
    

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD</button>
</form> 



</body> 
</html> 