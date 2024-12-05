<?php
    require_once('config.php');
?>

<?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hotel = $_REQUEST["hotel"];
        $checkIn = $_REQUEST["checkIn"];
        $checkOut = $_REQUEST["checkOut"];
        }
        $sql ="INSERT INTO bookings VALUES ('','$hotel', '$checkOut','$checkIn')";
        
        
        if(mysqli_query($conn, $sql)){
            header('Location: index.html?action=booked');
        } else{
            echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
        }
?>