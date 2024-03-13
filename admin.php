<?php
    include "header.php";
?>

<?php
            if(!isset($_SESSION["id"])){
            
                  header("location: admin_auth.php");
                
            }
            ?>

<?php
            if(isset($_SESSION["id"])){
                if($user_type!='admin'){
                  header("location: admin_auth.php");
                }
            }
            ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
                <div class="welcome_cont">
                <h1>Admin Room</h1>
                <span></span>
               
            
             </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container sec1">
   <div class="cent">
   <div class="split_nav">
        <div class="nav_left">
          <a href="admin.php"><h4>operations</h4></a>  
        </div>

        <div class="nav_right">
           <a href="admin.php?messages"><h4>Messages</h4></a> 
        </div>
        </div>
   </div>
    </div>


    <?php
      if(isset($_GET["messages"])){
        include 'reply.php';
      }

      else{
        include 'operations.php';
      }
    ?>

<?php 
        include "footer.php";
    ?>
</body>
</html>