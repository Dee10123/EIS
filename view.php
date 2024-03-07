<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <style>
        body{
            background:url('https://static.vecteezy.com/system/resources/previews/006/430/145/original/technology-background-concept-circuit-board-electronic-system-futuristic-hi-tech-light-on-dark-blue-free-vector.jpg')
        }
       div{
        
            width: 100%;
            max-width: 700px;
            background-color: #fff;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            padding:10px;
            margin-top:50px;
        
       }
      
       
       table{
        text-align: center;
       }
       td {
    padding: 12px;
    
    font-size: 16px;
    font-weight: normal;
    color: #000;
    text-align: center; 
}
h2{
    margin: 0;
    text-align:center;
    font-size:40px
    
}
.cont {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 200px;
    height: 200px;
    margin-bottom:0;
    margin-top:20px;
}
p {
    text-align: center;
    font-size: 50px;
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
    text-shadow:2px 1px black;
    color:gray;
    margin-bottom:0;
}
h3{
    margin:0;
    text-align:center;
    padding: 0px;
    margin-bottom:0px;
}
h1{
    text-align:center;
    color:blue;
    font-size:20px;
    margin:0;
}
h4{
    text-align:center;
    margin:0;
    margin-bottom:20px;
}
table{
    margin-left:30px;

}
.button {
    background-color: transparent;
    border: none;
    text-decoration: none;
    font-size: 20px;
    float: right; 
}








    </style>
</head>
<body>



    
    <div>
    <button class="button"><a href="adminlogin.php">X</a></button>
    <p>Employee Details</p>
        <div class="cont">
       
        <img  class="img"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuCf31SSHaH1Z8oPndTOFf1FctAz3_1GSQCe_7AA4wsDvpxNp2xh3pck7M5HGHj97zG8g&usqp=CAU" alt="Placeholder Image" width="150" height="150">
        </div>
<?php
include("connection.php");

if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];
    $db = new Database();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM main WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employeeId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $employee = $result->fetch_assoc();

           
            
           
            
           
            
            echo "<h2>";
            echo "<tr >";
           
            echo "<td>" . $employee['fullname'] . "</td>";
            echo "</tr>";
            echo "</h2>";

            echo "<h3>";
            echo "<tr>";
          
            echo "<td>" . $employee['position'] . "</td>";
            echo "</tr>";
            echo "<h3>";
            
            echo "<h1>";
            echo "<tr>";
            
            echo "<td>" . $employee['email'] . "</td>";
            echo "</tr>";
            echo "<h1>";
            
            echo "<h4>";
            echo "<tr>";
            echo "<th>+</th>";
            echo "<td>" . $employee['phone'] . "</td>";
            echo "</tr>";
            echo "<h4>";


            echo "<table>";
            echo "<tr>";
            echo "<th>Department :</th>";
            echo "<td>" . $employee['department'] . "</td>";
            echo "</tr>";
            echo "</table>";

            echo "<table>";
            echo "<tr>";
            echo "<th> Employee ID :</th>";
            echo "<td>" . $employee['ID'] . "</td>";
            echo "</tr>";
            echo "</table>";

            echo "<table>";
            echo "<tr>";
            echo "<th>Location :</th>";
            echo "<td>" . $employee['gender'] . "</td>";
            echo "</tr>";
            echo "</table>";
            
                        
            echo "<table>";
            echo "<tr>";
            echo "<th>Birthday :</th>";
            echo "<td>" . $employee['birthday'] . "</td>";
            echo "</tr>";
            echo "</table>";
            
            
            
            echo "<table>";
            echo "<tr>";
            echo "<th>Home Address :</th>";
            echo "<td>" . $employee['homeaddress'] . "</td>";
            echo "</tr>";
            echo "</table>";
            
            echo "<table>";
            echo "<tr>";
            echo "<th>Hire Date :</th>";
            echo "<td>" . $employee['hireday'] . "</td>";
            echo "</tr>";
            echo "</table>";
            
           
            
            echo "<table>";
            echo "<tr>";
            echo "<th>Salary :</th>";
            echo "<td>" . $employee['salary'] . "</td>";
            echo "</tr>";
            echo "</table>";
            
        
            
           
            
        } else {
            echo "Employee not found.";
        }
    } else {
        echo "Error retrieving employee data.";
    }
} else {
    echo "Employee ID not provided.";
}
?>
</div>
</body>
</html>