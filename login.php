<?php
$user = filter_input(INPUT_POST, "user");
$pass = filter_input(INPUT_POST, "pass");

if ($user == "admin" and $pass == "admin"){
    header("location: adminPanel.php");
} else {
    header("location: index.php");
}