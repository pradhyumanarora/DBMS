<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">
    <title>Homepage</title>
</head>

<body>
    <input type="checkbox" id="bars">
    <header>
        <label for="bars">
            <i class="fas fa-bars" id="navbarbtn"></i>
        </label>
        <div class="left">
            <img src="images/VASP title red.png" alt="Error Logo image" height="55px">
        </div>
        <div class="right">
            <button class="b1">Logout</button>
        </div>
    </header>
    <div class="navbar">
        <img src="images/avatar.png" alt="ProfilePic" class="ProfilePic">
        <h4><?php echo htmlspecialchars($_SESSION["name"])?></h4>
        <br>
        <div class="options">
            <a href="#"><i class="fas fa-info-circle"></i><span>Information center</span></a>
            <a href="#"><i class="fas fa-id-badge"></i><span>Profile</span></a>
            <a href="#"><i class="fas fa-book"></i><span>Academics</span></a>
            <a href="#"><i class="fas fa-pencil-alt"></i><span>Examinations</span></a>
            <a href="#"><i class="fas fa-hand-holding-heart"></i><span>Counsellor</span></a>
        </div>
    </div>

    <div class="content">
        <img src="images/background_hp.jpg" alt="error laoding bg">
    </div>
</body>

</html>