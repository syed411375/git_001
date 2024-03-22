<?php
$conn=mysqli_connect("localhost","root","","shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>