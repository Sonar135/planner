<?php
$output="";
  $get=mysqli_query($conn, "SELECT * from admin_contact where reply='' limit 3");

  if(mysqli_num_rows($get)<1){
    $output= '<h1>no messages at the moment</h1>';
  }


  while($row=mysqli_fetch_assoc($get)){
    $sender_email=$row["sender"];
    $message=$row["message"];
    $id=$row["id"];

    $get_name=mysqli_query($conn, "SELECT * from planners where email='$sender_email'");
    $sender=mysqli_fetch_assoc($get_name)["name"];


    $output.='    <div class="message_cont">
    <div class="profile_cont">
        <div class="profile">
        <i class="fa-solid fa-user"></i>
        </div>
        <h4>'.$sender.'</h4>
        </div>

        <div class="ad_messages">
      '.$message.'
        </div>
<form action="" method="post">
        <textarea name="admin_reply" id="" cols="30" rows="10" placeholder="reply"></textarea>
        <input type="text" class="" hidden name="id" value="'.$id.'">

        <div class="buttons">
          <button name="reply">reply</button>
          <button name="ignore">ignore</button>
        </div></form>
    </div>';
  }
?>


<?php
  if(isset($_POST["reply"])){
    $reply=$_POST["admin_reply"];
    $reply_id=$_POST["id"];
    

    if($reply==""){
      echo '  <div class="message" id="message">
      please write a reply
  </div>';
    }

    else{
      $update=mysqli_query($conn, "UPDATE admin_contact set reply='$reply' where id='$reply_id'");

      if($update){
        header("location: admin.php?messages");
      }
    }
  }




  if(isset($_POST["ignore"])){
    $reply="ignored";
    $reply_id=$_POST["id"];
    

    if($reply==""){
      echo '  <div class="message" id="message">
      please write a reply
  </div>';
    }

    else{
      $update=mysqli_query($conn, "UPDATE admin_contact set reply='$reply' where id='$reply_id'");

      if($update){
        header("location: admin.php?messages");
      }
    }
  }
?>







<div class="container messages">
      <div class="cent">
    
   
    <?php echo $output?>
        
      </div>
    </div>