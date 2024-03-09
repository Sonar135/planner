<?php
    include "header.php";
?>


<?php
$current_date = date('Y-m-d');

// Calculate the date 7 days from now
$seven_days_later = date('Y-m-d', strtotime('+7 days'));
$output="";


  $get=mysqli_query($conn, "SELECT * FROM events WHERE date >= '$current_date' AND date <= '$seven_days_later'");

  while($row=mysqli_fetch_assoc($get)){
    $name=$row["name"];
    $date=$row["date"];
    $venue=$row["venue"];
    $start_time=$row["start_time"];
    $end_time=$row["end_time"];
    $planner=$row["planner"];
   



    $output.='    <tr>
 
    <td><h3>'.$name.'</h3> </td>
    <td><h3>'.$date.'</h3></td>
    <td><h3>'.$start_time.' - '.$end_time.'</h3></td>
    <td><h3>'.$venue.'</h3></td>

  
  </tr>';
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css?v=<?php echo time();?>">
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
                <h1>WELCOME TO</h1>
                <span></span>
                <h1> PLANR</h1>
                <div class="circle">

                </div>
             </div>

             <h4>Crafting unforgettable events, stress-free planning.</h4>
                </div>
            </div>
        </div>

    </div>


    <div class="container sec1">
        <div class="cent">
            <h1>upcoming events</h1>

            <section>
  <!--for demo wrap-->

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Event</th>
          <th>Date</th>
          <th>Time</th>
          <th>Venue</th>
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

    <div class="container sec2">
      <div class="cent">
        <h1>Yearly Events</h1>
      </div>
    </div>
    <?php 
        include "footer.php";
    ?>
</body>
</html>