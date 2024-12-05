<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $email = $_POST["email"];

    if (empty($user) || empty($pass) || empty($email)) {
        echo "Please fill in all the fields.";
    } else {
        include('config.php');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO users (username, password, email) VALUES ('$user', '$pass', '$email')";

        if (mysqli_query($conn, $sql)) {
            header('Location: login.html?action=registered');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>