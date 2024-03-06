<?php
    include 'header.php';
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
                    <h1>Add Food</h1>

                    <div class="n_e">
                        <input type="text" placeholder="name" name="name">
                        <input type="number" placeholder="price" name="price">
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
                        <input type="text" placeholder="" name="category"  id="myInput" hidden >

                        <label for="image" class="label">
                            image
                        </label>
                        <input type="file" accept="image/*" name="image" hidden id="image">
                    </div>

                  

                    <div class="n_e">
                        <input type="number" placeholder="quantity" name="quantity">
                    </div>

               
                        <textarea name="desc" id="" cols="30" rows="10" placeholder="item description">Hey there, I am an event</textarea>
                 

                    <button name="submit">submit</button>
                </div></form>  
            </div>



  
        </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>