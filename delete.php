<?php
require 'users.php';

if (isset($_GET['id'])) {

    $userId = $_GET['id'];
    $user = getUserById($userId);

    if(!$user){
        header('Location:user_not_found.php');
    }else{
        deleteUser($userId);
        header('Location:index.php');

    }
}else {
    // Handle case where no ID is provided
    header("Location: user_not_found.php");
    exit;
}
