<?php
    include 'header.php';
?>




<?php

$output="";


  $get=mysqli_query($conn, "SELECT * FROM events WHERE planner= '$email' ");

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
    if(isset($_GET["success"])){
        echo '  <div class="message" id="message">
       Event Booked
    </div>';
    }

    if(isset($_POST["submit"])){
        $name=htmlentities($_POST["name"]);
        $venue=htmlentities($_POST["venue"]);
        $date=$_POST["date"];
        $start=$_POST["start"];
        $end=$_POST["end"];
        $desc=htmlentities($_POST["desc"]);


        $start_datetime = "$date $start:00";
$end_datetime = "$date $end:00";

// Query to check for overlapping events
$query = mysqli_query($conn, "SELECT * FROM events WHERE venue = '$venue' AND 
((start_time < '$end_datetime' AND end_time > '$start_datetime') 
OR (start_time >= '$start_datetime' AND start_time < '$end_datetime') 
OR (end_time > '$start_datetime' AND end_time <= '$end_datetime'))");

$num=mysqli_num_rows($query);

echo $num;






        if($name=="" or $venue=="" or $date=="" or $start=="" or $end=="" or $desc==""){
            echo '  <div class="message" id="message">
          please fill all fields
        </div>';
        }

       else  if(mysqli_num_rows($query)>0){
        echo '  <div class="message" id="message">
      clashing events
    </div>';

       }
    
        


        else{
            $insert=mysqli_query($conn, "INSERT into events (name, venue, date, start_time, end_time, planner, Description)
            
            values ('$name', '$venue', '$date', '$start', '$end', '$email', '$desc')") ;

            if($insert){
                header("location: plan.php?success#lock");
            }
        }
       }  

    


    
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/plan.css?v=<?php echo time()?>">
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
                    <h1>Plan Your Event</h1>

                    <div class="n_e">
                        <input type="text" placeholder="Event" name="name">

                    </div>

                    <div class="n_e">

                        <div class="select">
                           <span id="selected"> select venue </span>

                            <div class="selections">
                                <ul>
                                    <li id="list">Amphitheatre </li>
                                     
                                  
                                    <li id="list">Cafeteria</li>
                                     
                                     
                                       <li id="list">CIT </li>
                                      
                                     
                                       <li id="list">stadium</li>
                                       <li id="list">BBS</li>
                                       <li id="list">Buth 600 Seater</li>
                                    
                                </ul>
                            </div>
                        </div>
                        <input type="text" placeholder="" name="venue"  id="myInput" hidden >

                    
                        <input type="date"  name="date"  >
                    </div>

                  

                    <div class="n_e">
                        <input type="time" placeholder="start_time" name="start">
                        <input type="time" placeholder="end time" name="end">
                    </div>

               
                        <textarea name="desc" id="" cols="30" rows="10" placeholder=" description">Hey there, I am an event</textarea>
                 

                    <button name="submit">submit</button>
                </div></form>  
            </div>



  
        </div>
       

        <div class="container sec2">
            <div class="cent">
                <h1>Your Planned Events</h1>
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
          <th>delete</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="planned">
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
        include "footer.php";
    ?>
</body>
</html>