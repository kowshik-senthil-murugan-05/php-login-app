<?php
    include "dbconfig.php";

    $message = "";
    $messageClass = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = strtolower(trim($_POST["username"]));
        $password = trim($_POST["password"]);

        if(empty($username) || empty($password)){
            $message = "Username or Password cannot be empty.";
            $messageClass = "error";
        }else{
            $fetchUserQuery = "select * from users where username='$username'";
            $fetchResult = $conn->query($fetchUserQuery);

            if($fetchResult->num_rows > 0){
                $row = $fetchResult->fetch_assoc();

                if($row["password"] == $password){
                    header("location: homepage.php");
                    exit();
                }
                else{
                    $message = "Login failed. Incorrect password!";
                    $messageClass = "error";
                }
            }else
            {
                $message = "Login failed. Invalid user!";
                $messageClass = "error";
            }
        }
    }
?>

<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <div class="reg-container">

            <form method="post">
                
                    <h2 class="form-header">Login Form</h2>

                    <div class="inputs">
                        Username:
                        <input type="text"
                            placeholder="Enter username"
                            name="username"
                            required> 

                        Password:
                        <input type="password"
                            placeholder="Enter password"
                            name="password"
                            required> 

                        <button class="reg-btn" type="submit">Login</button>
                    </div>
                
            </form>

            <?php
                if($message != ""){
                    echo "<h2 class='$messageClass'>$message</h2>";
                }
            ?>

        </div>
    
    </body>
</html>