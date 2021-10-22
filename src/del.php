<?php
    include 'config.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM `exams` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        header("Location:index.php");
    }
    else{
        header("Location:error.php");
    }
    mysqli_close($conn);
?>