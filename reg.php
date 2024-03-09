<?php
    include "header.php";
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/reg.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
               
                </div>
            </div>
        </div>

    </div>


    <div class="container reg">
            <div class="cent">
                <a href="planner_auth.php"><div class="reg_box">
                    <div class="prof_i">
                    <i class="fa-solid fa-user"></i>                   
                    </div>

                    <h1>Planner</h1>
                </div></a>

                  <a href="user_auth.php"><div class="reg_box">
                    <div class="prof_i">
                    <i class="fa-solid fa-user-tie"></i>              
                    </div>

                    <h1>User</h1>
                </div></a>

                

             
        </div>
</div>

<?php
    include "footer.php";
?>
</body>
</html>