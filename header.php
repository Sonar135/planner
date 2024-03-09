<?php
  ob_start();
  session_start();
  include 'connect.php';
  if(isset($_SESSION["id"])){
    $user_type=$_SESSION['user_type'];
    $email=$_SESSION['email'];
    $user_phone=$_SESSION['phone'];
    $user_name=$_SESSION['name'];
  }
?>

        <?php
            if(isset($_SESSION["id"])){
                if($user_type==''){
                  
                }
            }
            ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/b782cf5553.js" crossorigin="anonymous"></script>  
    <link rel="icon" type="image/x-icon" href="images\kisspng-babcock-university-university-of-ibadan-academic-d-5b1c90eb26da71.7889147215285987631592-removebg-preview.png">
    <link rel="stylesheet" href="css/header.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siwes</title>
</head>
<body>

<div class="loader">
  <img src="images\8-removebg-preview.png" alt="">
</div>
    <div class="nav">
      <div class="upper">
        
      </div>
        <div class="nav_cont">
            <div class="logo_cont">
          <a href="main.php"> <h1>PLANR</h1></a>  
            </div>

            <div class="menu">
                <ul>

                <li>
                    <a href="main.php">  home</a>
                  </li>

          
                  
                  
                    
                  <?php
            if(isset($_SESSION["id"])){
                if($user_type=='planner'){
                  echo '  <li>
                  <a href="plan.php">Plan Event</a>
                </li>

                <li>
                <a href="chat.php">chat</a>
              </li>
              
              ';
                }

             
            }


         
            ?>

                    


                      


                      <li>
                      <a href="calendar.php">calendar</a>
                    </li>


                  
                    
               
                 

                    <?php
            if(isset($_SESSION["id"])){
                if($user_type==''){
                  
                }
                echo '  <a href="logout.php">Logout</a>';

            }

            else{
              echo '     <a href="reg.php">register</a>';
            }
            ?>

   
                      
<li>
                     <a href="contact_admin.php"> Contact</a>
                    </li>
          
                </ul>
            </div>
        </div>
        <span id="line"></span>
    </div>
</body>
<script src="js/min.js"></script>
<script src="js/dom.js"></script>

<script>
  $(window).on("load", ()=>{
    $(".loader").fadeOut("slow")
    $("body").css("overflow-y", "scroll");
  });
</script>
</html>






