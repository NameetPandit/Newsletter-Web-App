<?php
include("database.php");
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $conn->real_escape_string($_POST['email']);

    $sql = "INSERT INTO subscribers(email) VALUES ('$email')";


    if($conn->query($sql) == TRUE)
    {
        echo "You have subscribed sucessfully";

    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>