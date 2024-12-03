<?php
$db_server="localhost:3308";
$db_user="root";
$db_pass="";
$db_name="newsletterappdb";
$db_conn="";
$conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if(!$conn)
{
    echo "Could not connect to the database:";
}
else
{
    echo "Connected to the database!";
}
?>