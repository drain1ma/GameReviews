<!DOCTYPE html> 
<html> 
<head> 
   <link rel="stylesheet" href="css/site.css">
</head> 
<body> 
    <?php 
          
        include 'templates/header.php'; 
        include 'templates/footer.php'; 
    ?> 

   <div class="logo">
   </div>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
    </form> 
</body> 
</html> 


<?php ?> 