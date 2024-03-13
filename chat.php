<?php
    include 'header.php';
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

                        <h4>Efidi Victor</h4>
                    </div>
                </div>

                <ul class="others">
                    <li>
                    <div class="inner">
                        <div class="profile">
                        <i class="fa-solid fa-user"></i>
                        </div>

                        <h4>Efidi Victor</h4>
                    </div>
                    </li>

                    <li>
                    <div class="inner">
                        <div class="profile">
                        <i class="fa-solid fa-user"></i>
                        </div>

                        <h4>Efidi Victor</h4>
                    </div>
                    </li>

                    <li>
                    <div class="inner">
                        <div class="profile">
                        <i class="fa-solid fa-user"></i>
                        </div>

                        <h4>Efidi Victor</h4>
                    </div>
                    </li>
                </ul>
            </div>

            <div class="chat_box">
                <div class="rec_prof">
                <div class="inner">
                        <div class="profile">
                        <i class="fa-solid fa-user"></i>
                        </div>

                        <h4>Efidi Victor</h4>
                    </div>
                </div>

                <div class="chat_area">
                    <div class="sender">
                        <div class="sending">

                        </div>
                    </div>


                    <div class="sender">
                        <div class="sending">

                        </div>
                    </div>

                    <div class="receiver">
                        <div class="receiving">

                        </div>
                    </div>
                    <div class="sender">
                        <div class="sending">

                        </div>
                    </div>

                    <div class="receiver">
                        <div class="receiving">

                        </div>
                    </div>

                    <div class="receiver">
                        <div class="receiving">

                        </div>
                    </div>
                    <div class="sender">
                        <div class="sending">

                        </div>
                    </div>

                    <div class="receiver">
                        <div class="receiving">

                        </div>
                    </div>    <div class="receiver">
                        <div class="receiving">

                        </div>
                    </div>
                    <div class="sender">
                        <div class="sending">

                        </div>
                    </div>

                    <div class="receiver">
                        <div class="receiving">

                        </div>
                    </div>
                </div>


              <form action=""> <div class="message_box">
                    <input type="text" placeholder="message">
                    <button>send</button>
                </div></form> 
            </div>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>