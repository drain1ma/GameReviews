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
    <?php 
        $sql = "SELECT * FROM user"; 
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['user_id']; 
                $sqlImg = "SELECT * FROM profileimg WHERE user_id =$id";
                $resultImg = mysqli_query($conn, $sqlImg); 
                while($rowImg = mysqli_fetch_assoc($resultImg)){
                    echo "<div>"; 
                    if($rowImg['status'] == 0){
                        echo "<img src='uploads/profile".$id.".jpg'>"; 
                    }
                    else{
                        echo "<img src='uploads/profiledefault.jpg'>"; 
                    }
                    echo $row['username']; 
                    echo "</div>"; 
                } 
            }
        } 
       if (isset($_SESSION["username"])){
        echo $_SESSION["username"];  
    }
    
    ?> 

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD</button>
</form> 



</body> 
</html> 