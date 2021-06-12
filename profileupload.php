<?php 
$sql2 = "SELECT * FROM users WHERE user_name='$userName'";
$result2 = mysqli_query($conn, $sql2); 
if (mysqli_num_rows($result2) > 0){
    while($row = mysqli_fetch_assoc($result2)){
        $userid = $row['id']; 
        $sql = "INSERT INTO profileimg (user_id, status) VALUES ('user_id', 1)"; 
        mysqli_query($conn, $sql);
    }
}   
else {
    echo "You have an error!"; 
}
?>

