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

        $delete=mysqli_query($conn, "DELETE from events where id='$id' ");

        if($delete){

            if(isset($_GET["admin"])){
                header("location: admin.php#planned");
            }

            else{
                header("location: plan.php#planned");
            }
         
        }
    }



    if(isset($_GET["planner"])){
        $id=$_GET["planner"];

        $delete=mysqli_query($conn, "DELETE from planners where id='$id' ");

        if($delete){
            header("location: admin.php");
        }
    }


    if(isset($_GET["user"])){
        $id=$_GET["user"];

        $delete=mysqli_query($conn, "DELETE from users where id='$id' ");

        if($delete){
            header("location: admin.php");
        }
    }




  
?>