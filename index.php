<!DOCTYPE html> 
<html> 
    <?php include_once 'connection.inc.php' ?>
<head> 
    
</head> 
<body> 
    <nav>
        <div class="container"> 
        </div> 
            <a href="games.php">Games</a> 
            <ul>
                <li><a href="#">Commissions</a> </li> 
            </ul> 
    </nav> 


    <form action="signup.inc.php" method="POST"> 
    <input type="text" name="user_name" placeholder="username"> <br> 
    <input type="text" name="user_email" placeholder="email"> <br> 
    <input type="password" name="user_pwd" placeholder="password"> <br> 
    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button> 
    </form> 
    <?php 
        $sql = "SELECT * FROM users;"; 
        $result = mysqli_query($conn, $sql); 
        $resultCheck = mysqli_num_rows($result); 


        if ($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo $row['user_name'] . "<br> "; 
            }
        }
    ?>
</body> 

<?php include 'templates/footer.php'?> 
</html> 




