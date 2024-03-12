<?php
    include 'header.php';
?>


<?php

    if(isset($_GET["event"])){
        $id=$_GET["event"];
    }



    $output="";


  $get=mysqli_query($conn, "SELECT * FROM events WHERE id='$id'");

  while($row=mysqli_fetch_assoc($get)){
    $name=$row["name"];
    $date=$row["date"];
    $venue=$row["venue"];
    $start_time= substr($row["start_time"], 0, 5);
    $end_time= substr($row["end_time"], 0, 5);
    $planner=$row["planner"];
    $desc=$row["Description"];

   



    $output.='    <tr>
 
    <div class="welcome_cont">
    <h1>'.$name.'</h1>
    <span></span>
    <h4>'.$venue.'</h4>

 
    <div class="circle">

    </div>
 </div>
 <h4>'.$start_time.' - '.$end_time.'</h4>

 <div class="event_description">
 '.$desc.'
 </div>';
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/event.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">

                <?php echo $output?>

                </div>
            </div>
        </div>

    </div>
</body>
</html>