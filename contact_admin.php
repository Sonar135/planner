<?php
    include "header.php";
?>



<?php

    if(isset($_GET["sent"])){
        echo '  <div class="message" id="message">
      sent successfully
    </div>';
    }


    if(isset($_POST["submit"])){
        $email=$_POST["email"];
        $message=htmlentities($_POST["message"]);


        if($email=="" or $message==""){
            echo '  <div class="message" id="message">
            please fill all fields
        </div>';
        }


        else{
            $query=mysqli_query($conn, "INSERT into admin_contact (sender, message) values('$email', '$message')");

            if($query){
                header("location: contact_admin.php?sent");
            }
        }
    }







    $reply='';

    $get=mysqli_query($conn, "SELECT * from admin_contact where reply!='' and sender='$email'");

    if(mysqli_num_rows($get)<1){
        $reply='<h1>no replies from admin</h1>';

        
    }

    while($row=mysqli_fetch_assoc($get)){
        $re=$row["message"];
        $admin_reply=$row["reply"];

        $reply.='     <div class="rep_cont">
        <div class="re">
            <h4>Re:'.$re.'</h4>
        </div>

        <div class="reply">
            <h4>Admin:</h4>
            <div class="ad_rep">
          '.$admin_reply.'
            </div>
        </div>
    </div>';
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/contact.css?v=<?php echo time();?>">
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


    
    <div class="container auth">
            <div class="cent signup">
                <div class="left" id="super">
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post" id="lock"   enctype="multipart/form-data">  <div class="right">
                    <h1>Contact Admin</h1>

                    <div class="n_e">
                        <input type="text" placeholder="Full Name" name="name" value="<?php echo $user_name?>">
                        <input type="email"  name="email" value="<?php echo $email?>" placeholder="email">

                    </div>

                    <div class="n_e">

                    <input type="text" placeholder="phone" name="end" value="<?php echo $user_phone?>">
                  

                    
                    
                    </div>

                  

                 
               
                        <textarea name="message" id="" cols="30" rows="10" placeholder=" message"></textarea>
                 

                    <button name="submit">submit</button>
                </div></form>  
            </div>



  
        </div>


        <div class="container sec1">
        <h1>admin replies</h1>
            <div class="cent">
           <?php echo $reply?>
            </div>
        </div>
       <?php 
        include "footer.php";
       ?>
</body>
</html>