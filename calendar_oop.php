
<?php
    include 'header.php';
    include 'calendar.php';
    $calendar = new Calendar();

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


    <div class="conttainer sec1">
        <div class="cent">
            <?php
         echo $calendar->show();
            ?>
        </div>
    </div>
</body>
</html>