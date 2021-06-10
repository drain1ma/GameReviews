<?php 
$sql = "SELECT * FROM user WHERE user_name='$userName' AND user_email='$userEmail'";
$result = mysqli_query($conn, $sql); 
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $userid = $row['id']; 
        $sql = "INSERT INTO profileimg (user_id, status) VALUES ('user_id', 1)"; 
        mysqli_query($conn, $sql);
    }
}
else {
    echo "You have an error!"; 
}
?>

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