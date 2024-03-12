<?php
    include "header.php";
?>

<?php

$output="";


$get=mysqli_query($conn, "SELECT * FROM events ");

if(mysqli_num_rows($get)<1){
  $output='<h1>You Have No Planned Events</h1>';
}

while($row=mysqli_fetch_assoc($get)){
  $name=$row["name"];
  $date=$row["date"];
  $venue=$row["venue"];
  $start_time=$row["start_time"];
  $end_time=$row["end_time"];
  $planner=$row["planner"];
  $id=$row["id"];


  $output.='    <tr>

  <td><h3>'.$name.'</h3> </td>
  <td><h3>'.$date.'</h3></td>
  <td><h3>'.$start_time.' - '.$end_time.'</h3></td>
  <td><h3>'.$venue.'</h3></td>
  <td><a href="delete.php?event='.$id.'" class=""><div class="tb_ico"><i class="fa-solid fa-trash"></i></div></td></a>

</tr>';
}


?>




<?php

$users="";


$get_users=mysqli_query($conn, "SELECT * FROM users ");

if(mysqli_num_rows($get_users)<1){
  $users='<h1>No Users Registered</h1>';
}

while($row=mysqli_fetch_assoc($get_users)){
  $name=$row["name"];
  $phone=$row["phone"];
  $email=$row["email"];

  $id=$row["id"];


  $users.='    <tr>

  <td><h3>'.$name.'</h3> </td>
  <td><h3>'.$phone.'</h3></td>
  <td><h3>'.$email.'</h3></td>
  <td><a href="delete.php?event='.$id.'" class=""><div class="tb_ico"><i class="fa-solid fa-trash"></i></div></td></a>

</tr>';
}


?>




<?php

$planners="";


$get_planners=mysqli_query($conn, "SELECT * FROM planners ");

if(mysqli_num_rows($get_planners)<1){
  $planners='<h1>No Users Registered</h1>';
}

while($row=mysqli_fetch_assoc($get_planners)){
  $name=$row["name"];
  $phone=$row["phone"];
  $email=$row["email"];

  $id=$row["id"];


  $planners.='    <tr>

  <td><h3>'.$name.'</h3> </td>
  <td><h3>'.$phone.'</h3></td>
  <td><h3>'.$email.'</h3></td>
  <td><a href="delete.php?event='.$id.'" class=""><div class="tb_ico"><i class="fa-solid fa-trash"></i></div></td></a>

</tr>';
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
    
        <div class="message_cont">
        <div class="profile_cont">
            <div class="profile">
              
            </div>
            </div>

            <div class="ad_messages">

            </div>
        </div>
      </div>
    </div>


<?php 
        include "footer.php";
    ?>
</body>
</html>