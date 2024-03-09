<?php
    include "connect.php";

    ob_start();
    session_start();
    include 'connect.php';
    if(isset($_SESSION["id"])){
      $user_type=$_SESSION['user_type'];
      $email=$_SESSION['email'];
    }




    if(isset($_GET["event"])){
        $id=$_GET["event"];
    }




    $delete=mysqli_query($conn, "DELETE from events where id='$id' ");

    if($delete){
        header("location: plan.php#planned");
    }
?>