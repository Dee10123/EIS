<?php
session_start();

require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $database = new Database();
    $conn = $database->getConnection();

    if ($role === "employee") {
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    } elseif ($role === "admin") {
        $query = "INSERT INTO admins (username, password) VALUES (?, ?)";
    } elseif ($role === "view") {
        $query = "INSERT INTO views (username, password) VALUES (?, ?)";
    }

    $stmt = $conn->prepare($query);
    
    if ($stmt === false) {
        die("Error preparing the SQL query: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute()) {
       
    } else {
        die("Error executing the SQL query: " . $stmt->error);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="mainstyles.css" rel="stylesheet" media="all">
<style>
    body {
background: url('https://static.vecteezy.com/system/resources/previews/006/430/145/original/technology-background-concept-circuit-board-electronic-system-futuristic-hi-tech-light-on-dark-blue-free-vector.jpg')no-repeat;
background-size: cover;
padding: 0px;
border-radius: 8px;
box-shadow: 4px 5px 10px rgba(0, 023, 0, 0.3);
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
margin: 0;


} 
h1 {
            font-size: 36px;
            font-weight: bold;
            color: white;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            text-shadow:5px 4px black;
        }
        h2{
            color:white;
            font-size:30px;
            text-shadow:4px 3px gray;
        }
        label.fas.fa-bars, a.logo {
    margin-left:10px;
    color:white;
    background:transparent;
    border:1px ;
}
a.logo span {
    color:black; 
    background-color:orange;
    border-radius:5px;
    
}
</style>
</head>

<body>
    <header>
        <input type="checkbox" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">Wonder <span>Pets </span></a>
        <nav class="navbar">
            <a href="#login-link" id="login-link"></a>
            <a href="index.php" id="login">LOGIN</a>
            <a href="signupp.php" id="login">SIGN-UP</a>

            
           
        </nav>
    </header>
    <div>
    <h1>Employee Information System</h1>
    <div class="login-box">
        <h2>Sign-Up</h2>
        <form method="POST" action="">
            <div class="textbox">
                <input type="text" placeholder="&#xf007; Username" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="&#xf022; Password" name="password" required>
            </div>
            <div class="select-box">
            <select name="role" required>
                <option value="" disabled selected>Sign up As</option>
                <option value="employee">Employee</option>
                <option value="admin">Admin</option>
                
                </select>
            </div>
            
            <input type="submit" class="btn" value="Sign-up">
           
        </form>
        </div>
    </div>

    
</body>


</html>