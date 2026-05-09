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
        }
        else{
            $isUserExists = "select * from users where username='$username'";
            $result = $conn->query($isUserExists);

            if($result->num_rows > 0){
                $message = "User already exists. Try again!";
                $messageClass = "error";
            }else{
                $insertQuery = "insert into users (username, password) values ('$username', '$password')";
                $insertResult = $conn->query($insertQuery);

                if($insertResult == TRUE){
                    header("location: login.php");
                    exit();
                }else{
                    $message = "Registration failed. Try again!!";
                    $messageClass = "error";
                }
            }
        }
    }

?>

<html>
    <head>
        <title>User Registration</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="reg-container">

            <form method="post">
                
                    <h2 class="form-header">Registration Form</h2>

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

                        <button class="reg-btn" type="submit">Register</button>
                    </div>

                    <div class="nav-login">
                        <p>Already a registerd user?</p>

                        <a href="login.php">Login</a>
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