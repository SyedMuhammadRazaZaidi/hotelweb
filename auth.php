<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $pass = $_POST["password"];

        include('config.php');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$pass'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $dbpassword = $row['password'];
            
            if ($pass === $dbpassword) {
                $_SESSION['username'] = $username;
                header('Location: index.html?action=login');
            } else {
                echo "Invalid username or password.1";
            }
        } else {
            echo "Invalid username or password.";
        }

        mysqli_close($conn);
    }
?>