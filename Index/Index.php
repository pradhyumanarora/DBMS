<?php 
$servername="localhost";
$username = "root";
$password = "";
$dbname = "login";

try{
    /*$this->_pdo = new PDO("mysql:host=".config::get('mysql/host').";dbname=".config::get('mysql/database') ,config::get('mysql/user'),config::get('mysql/password'));*/
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
    $name = $password = $nameErr = $passwordErr = $error = "";

    if($_SERVER['REQUEST_METHOD']=="POST"){
        // echo" !!!!";
        // echo json_encode($_POST);
        // echo" !!!!";
        if(empty(test_input($_POST["username"]))){
            $nameErr="Enter Username";
        }
        else{
            $name=test_input($_POST["username"]);
        }
        if(empty(test_input($_POST["password"]))){
            $passwordErr="Enter Password";
        }
        else{
            $password=test_input($_POST["password"]);
        }
        echo "Iiii0";

    }
    echo " --------------";
    echo "$passwordErr";
    echo "$nameErr";
    echo " --------------";
    
    if(empty($nameErr)&&empty($passwordErr)){
        //echo "AAAAA";

        $stmt=$conn->query("SELECT id from `user` where name='$name' and password='$password';");
        //echo "AAAAA1111";
        if($stmt->execute()){
            if($stmt->rowcount()==1){
                session_start();
                $_SESSION["name"]=$name;
                header("location: ../HomePage/homepage.php");
            }
            else{
                $error="username or password didn't match";
            }
        }
    }

}


catch(PDOException $e)
{
    echo "Error: ".$e->getMessage();
}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index CSS</title>
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>

<body>
    
    <div class="title">
        <img src="./images/VASP title red.png" alt="Error" >
        <!-- <u><b>V A S P </b></u> -->
    </div>

    <div class="login_box">
        <img src="./images/avatar3.png" alt="Error" height="120">
        
        <h3>Login</h3>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
            <div class="txtbox">
                <span></span>
                <input class="txtbox" type="text" name="username" id="username" required placeholder="Username" >
            </div>
            <div class="txtbox">
                 <span></span>
                <input type="password" class="txtbox" name="password" id="password" required placeholder="Password"></input>
            </div>
            <div>
                <input type="submit" name="submit" value="Sign in">
            </div>
            <br>
            <div class="forgot">
                Forgot Password ?
            </div>

        </form>
    </div>

    <footer>
        <!-- <span class="footnote"><u>VASP</u></span> -->
        <div class="footer-content">
            <span>Copyright &copy;. VASP and co. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>