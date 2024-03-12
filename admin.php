<?php
    include "header.php";
?>

<?php
$output="";
  $get=mysqli_query($conn, "SELECT * from admin_contact where reply=''");

  if(mysqli_num_rows($get)<1){
    $output= '<h1>no messages at the moment</h1>';
  }


  while($row=mysqli_fetch_assoc($get)){
    $sender_email=$row["sender"];
    $message=$row["message"];

    // $get_name=mysqli_query($conn, "SELECT * from planners where email='$sender_email'");
    // $sender=mysqli_fetch_assoc($get_name)["name"];


    $output.='    <div class="message_cont">
    <div class="profile_cont">
        <div class="profile">
        <i class="fa-solid fa-user"></i>
        </div>
        <h4>'.$sender_email.'</h4>
        </div>

        <div class="ad_messages">
      '.$message.'
        </div>
<form action="">
        <textarea name="" id="" cols="30" rows="10" placeholder="reply"></textarea>

        <div class="buttons">
          <button>reply</button>
          <button>ignore</button>
        </div></form>
    </div>';
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
             
                </div>
            </div>
        </div>

    </div>

    <div class="container sec1">
   <div class="cent">
   <div class="split_nav">
        <div class="nav_left">
          <a href=""><h4>operations</h4></a>  
        </div>

        <div class="nav_right">
           <a href=""><h4>Messages</h4></a> 
        </div>
        </div>
   </div>
    </div>

    <div class="container messages">
      <div class="cent">
    
   
    <?php echo $output?>
        
      </div>
    </div>


<?php 
        include "footer.php";
    ?>
</body>
</html>