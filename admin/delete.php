<?php
include 'connection.php';
$delete = $_GET['del'];
$sql = "delete from products where id = '$delete'";
if(mysqli_query($conn,$sql))
           {

            echo '<script> location.replace("aindex.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;

           }

?>