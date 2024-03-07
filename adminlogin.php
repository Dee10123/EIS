<?php
session_start();


require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    if (isset($_POST["add_employee"])) {
      
        $fullname = $_POST['fullname'];
        $department = $_POST['department'];
        $position = $_POST['position'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $homeaddress = $_POST['homeaddress'];
        $hireday = $_POST['hireday'];
        $salary = $_POST['salary'];

       
        $database = new Database();
        $conn = $database->getConnection();

      
        $query = "INSERT INTO main (fullname, department, position, email, phone, birthday, gender, homeaddress, hireday, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssss",$fullname, $department, $position, $email, $phone, $birthday, $gender, $homeaddress, $hireday, $salary);

        if ($stmt->execute()) {
            echo "Employee added successfully.";
        } else {
            echo "Error adding employee: " . $stmt->error;
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $employeeId = $_GET["id"];

    
    $db = new Database();
    $conn = $db->getConnection();

    $sql = "DELETE FROM main WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employeeId);

    if ($stmt->execute()) {
      
        header("Location: adminlogin.php");
        exit();
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Information System</title>
    <link href="styles.css" rel="stylesheet" media="all">


<style>
    #addemployee {
    display: none;
    
}
.add-employee-button {
    float: right;
    padding: 10px 30px;
    background-color: #0074d9;
    color: #fff ; /* Text color */
    text-decoration: none;
    border: none;
    font-size:16px;
    border-radius: 10px; 
    cursor: pointer;
    margin-top:15px;
    
}
.add-employee-button:hover {
    background-color: #0056b3; 
}
div {
    max-width: 900px;
    margin: 0 auto;
   padding:0px;
   margin-top:20px;
    border-radius: 8px;
    
}
.div2 {
    max-width: 900px;
    margin: 0 auto;
    background: transparent;
   padding:20px;
   margin-top:20px;
    border-radius: 8px;
    backdrop-filter:blur(8px);
    margin-left:200px;
    margin-right:200px;
   
    
}
.div2 .label .input{
    color:white;
}
header{
    background: transparent;
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


  
</head>
<body>
    <header>
        <input type="checkbox" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">Wonder <span>Pets </span></a>
        <nav class="navbar">
            
            <a href="javascript:void(0);" onclick="showEmployeeList()">Employee List</a>
            <a href="index.php">Logout</a>
        </nav>
    </header>

    

   
    <section id="employeelist">
    <h3>Employee List</h3>

    <!-- Add search bars and button for ID and name -->
    
    <div class="vertical-search-bar">
        <label for="id-search"></label>
        <input type="text" id="id-search" onkeyup="searchEmployee()" placeholder="Search ID">
    </div>
    <div class="vertical-search-bar">
        <label for="name-search"></label>
        <input type="text" id="name-search" onkeyup="searchEmployee()" placeholder="Search Name">
    </div>
    
    

    <a href="javascript:void(0);" onclick="showAddEmployee()"class="add-employee-button">+ Add Employee</a>
   

  
        <?php
require_once('connection.php');

class EmployeeList {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listEmployee() {
        $sql = "SELECT * FROM main"; // Replace 'main' with your actual employee table name
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Fullname</th><th>Department</th><th>Position</th><th>Email</th><th>Phone</th><th>Birthday</th><th>gender</th><th>Home Address</th><th>Action</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['position'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['birthday'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['homeaddress'] . "</td>";
                
                echo "";
                echo "<td><a class='link-button' href='new.php?id=" . $row['ID'] . "'>Edit</a> | <a class='link-button' href='adminlogin.php?id=" . $row['ID'] . "'>Delete</a> | <a class='link-button' href='view.php?id=" . $row['ID'] . "'>view</a></td>";
                echo "</tr>";
            }
 
            echo "</table>";
        } else {
            echo "No employee records found.";
        }
    }
}

// Usage:
$database = new Database(); 
$conn = $database->getConnection();

$employeeList = new EmployeeList($conn);
$employeeList->listEmployee();

?>


</table>
    </section>
    <section id="addemployee">
        <div class="div2">
        <br><br>
        <form method="POST" action="adminlogin.php">
            <input type="hidden" name="add_employee" value="1">
            <h3>Add Employee</h3>
            <br>
            <label for="fullname">Fullname:</label>
            <input type="text" name="fullname" required><br>
            <label for="department">Department:</label>
            <input type="text" name="department" required><br>

            <label for="position">Position:</label>
            <input type="text" name="position" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" required><br>

            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" required><br>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" required><br>

            <label for="homeaddress">Home Address:</label>
            <input type="text" name="homeaddress" required><br>

            <label for="hireday">Hire Day:</label>
            <input type="date" name="hireday" required><br>

            <label for="salary">Salary:</label>
            <input type="number" name="salary" required><br>

            <input type="submit" value="Add Employee">
        </form>
        </div>
    </section>
    
    

    <script>
    function searchEmployee() {
        var inputID = document.getElementById("id-search").value.toLowerCase();
        var inputName = document.getElementById("name-search").value.toLowerCase();
        var table = document.querySelector("table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            var idCell = rows[i].getElementsByTagName("td")[0].textContent.toLowerCase();
            var nameCell = rows[i].getElementsByTagName("td")[1].textContent.toLowerCase();

            if (idCell.includes(inputID) && nameCell.includes(inputName)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
    function showAddEmployee() {
            document.getElementById("employeelist").style.display = "none";
            document.getElementById("addemployee").style.display = "block";
        }

      
        function showEmployeeList() {
            document.getElementById("addemployee").style.display = "none";
            document.getElementById("employeelist").style.display = "block";
        }
    
</script>



</body>
</html>
