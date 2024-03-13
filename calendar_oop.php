
<?php
    include 'header.php';
    include 'calendar.php';
    $calendar = new Calendar();

?>



<?php

$cal_month='';
$cal_year='';



$output='';
$event_date='';

if(isset($_GET["date"])){
    $event_date=$_GET["date"];
}

$get=mysqli_query($conn, "SELECT * FROM events WHERE date = '$event_date' ");

while($row=mysqli_fetch_assoc($get)){
  $name=$row["name"];
  $date=$row["date"];
  $venue=$row["venue"];
  $start_time= substr($row["start_time"], 0, 5);
  $end_time= substr($row["end_time"], 0, 5);
  $planner=$row["planner"];
  $id=$row["id"];
 



  $output.='    <tr>

  <td><h3>'.$name.'</h3> </td>
  <td><h3>'.$date.'</h3></td>
  <td><h3>'.$start_time.' - '.$end_time.'</h3></td>
  <td><h3>'.$venue.'</h3></td>
  <td id="ico"><a href="event.php?event='.$id.'" class=""><div class="tb_ico"><i class="fa-solid fa-eye"></i></div></a></td>


</tr>';
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/calendar.css?v=<?php echo time();?>">
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
                <h1>Event Calendar</h1>
                <span></span>
               
            
             </div>
                </div>
            </div>
        </div>

    </div>


    <div class="conttainer sec1" >
        <div class="cent" >
            <?php
            
         echo $calendar->show();
            ?>
        </div>
    </div>



    <div id="lock"></div>
    
    <div class="container sec2" >
        <div class="cent">
            <h1>Select A Date To See Events</h1>

            <section >
  <!--for demo wrap-->

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Event</th>
          <th>Date</th>
          <th>Time</th>
          <th>Venue</th>
          <th>See Event</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="lock">
      <tr>
 
        <?php echo $output?>

  </tr>




      </tbody>
    </table>
  </div>
</section>

        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>