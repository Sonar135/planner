<?php
    include 'header.php';
?>



<?php
    $planners="";
    $none="";
    $get_planners=mysqli_query($conn, "SELECT * FROM planners where email!='$email' ");

    while($planner_row=mysqli_fetch_assoc($get_planners)){
        $p_name=$planner_row["name"];
        $p_email=$planner_row["email"];

        $get_chat_num=mysqli_query($conn, "SELECT * from chat where sender='$p_email' and receiver='$email' and status='unread'");

        $num_row=mysqli_num_rows($get_chat_num);

        if($num_row<1){
            $none="none";
        }




        $planners.='     <a href="chat.php?r='.$p_email.'#lock"><li>
        <div class="inner">
        <div class="num '.$none.'">'.$num_row.'</div>
            <div class="profile">
            <i class="fa-solid fa-user"></i>
            </div>

            <h4>'.$p_name.'</h4>
        </div>
        </li></a> ';
    }
?>




<?php
 $r_name="";
 $r_email="";
 $hash="";
 $chat="";
    $disable_text="disabled";
    if(isset($_GET["r"])){
        $recip=$_GET["r"];
        $disable_text="";

        $get_recip=mysqli_query($conn, "SELECT * from planners where email='$recip'");
        $r_row=mysqli_fetch_assoc($get_recip);
        $r_name=$r_row["name"];
        $r_email=$r_row["email"];

        $update=mysqli_query($conn, "UPDATE chat set status='seen' where sender='$recip' and receiver='$email'");

        

        $get_latest=mysqli_query($conn, "SELECT * from chat where (sender='$email' and receiver='$recip') or (sender='$recip' and receiver='$email') order by id desc limit 1");

        $latest=mysqli_fetch_assoc($get_latest)["message"];

        $get_chat=mysqli_query($conn, "SELECT * from chat where (sender='$email' and receiver='$recip') or (sender='$recip' and receiver='$email')");

        while($chat_row=mysqli_fetch_assoc($get_chat)){
            $chat_mes=$chat_row["message"];
            $chat_sender=$chat_row["sender"];
           

            $is_sender = ($chat_sender == $email) ? true : false;

            if($chat_mes==$latest){
                $hash="lock";
            }


            if ($is_sender) {
                $chat.= '
                <div class="" id='.$hash.'></div>
                <div class="sender" >
                          <div class="sending">' .$chat_mes. '</div>
                      </div>';
            } else {
                $chat.= '
                <div class="" id='.$hash.'></div>
                <div class="receiver">
                          <div class="receiving" >' .$chat_mes. '</div>
                      </div>';
            }





            
        }
}


   
 

   
  
   

  
?>



<?php
    if(isset($_POST["send"])){
        $message=htmlentities($_POST["message"]);
        $recipient=$_POST["recipient"];
        $status="unread";

        $insert=mysqli_query($conn, "INSERT into chat (sender, receiver, status, message) values
        ('$email', '$recipient', '$status', '$message')");


            if($insert){
                header("location: chat.php?r=$recipient#lock");
            }
    }
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/chat.css?v=<?php echo time();?>">
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
                <h1>Chat Room</h1>
                <span></span>
               
            
             </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container sec1">
        <div class="cent">
            <div class="users">
                <div class="you">
                    <div class="inner">
                        <div class="profile">
                        <i class="fa-solid fa-user"></i>
                        </div>

                        <h4><?php echo $user_name?></h4>
                    </div>
                </div>

                <ul class="others">
              
                    <?php echo $planners?>
           
                </ul>
            </div>

            <div class="chat_box">
                <div class="rec_prof">
                <div class="inner">
                        <div class="profile">
                        <i class="fa-solid fa-user"></i>
                        </div>

                        <h4><?php echo $r_name?></h4>
                    </div>
                </div>

                <div class="chat_area">
                 <?php echo $chat?>
                </div>


              <form action="" method="post"> <div class="message_box">
                    <input <?php echo $disable_text?> type="text" placeholder="message" name="message" id="my_input">
                    <input type="text" hidden value="<?php echo $r_email?>" name="recipient">
                    <button name="send" id="my_btn">send</button>
                </div></form> 
            </div>
        </div>

      
    </div>

    <?php
        include 'footer.php';
    ?>
</body>


</html>