<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Employee</title>

    <!-- Add your CSS and JavaScript libraries as needed -->
    <style>
        body{
            background:url('https://static.vecteezy.com/system/resources/previews/006/430/145/original/technology-background-concept-circuit-board-electronic-system-futuristic-hi-tech-light-on-dark-blue-free-vector.jpg')no-repeat;
        }
        .container {
            margin: 20px;
            padding-left:400px;
            padding-right:400px;
        }

        .content {
            margin-top: 20px;
        }

        h2 {
            color: #007BFF;
        }

        form {
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
            padding-right:25px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }  
        /* Primary Button (Save) */
.btn-primary {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-left:20px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Danger Button (Cancel) */
.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-left:20px;
    decloration
}

.btn-danger:hover {
    background-color: #a52a35;
   
}
.col-sm-3.control-label {
    color: white;
}
@media screen and (max-width: 768px) {
    .container {
        margin: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }

    .form-group {
        margin-bottom: 15px;
        padding-right: 20px;
    }

    /* Adjust other styles for smaller screens */
}

    </style>

</head>
<body>
    <div class="container">
        <div class="content">
            <h2>Edit Employee Data</h2>
           <hr>

            <?php
include("connection.php");

$db = new Database(); // Create an instance of the Database class

// Check if 'id' is set in the query string
if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];
    $sql = mysqli_query($db->getConnection(), "SELECT * FROM main WHERE ID='$employeeId'");

    if ($sql) {
        $row = mysqli_fetch_assoc($sql);

        if (isset($_POST['save'])) {
            // Retrieve and update the employee data
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

            $update = mysqli_query($db->getConnection(), "UPDATE main SET fullname='$fullname', department='$department', position='$position', email='$email', phone='$phone', birthday='$birthday', gender='$gender', homeaddress='$homeaddress', hireday='$hireday', salary='$salary' WHERE ID='$employeeId'");

            if ($update) {
                header("Location: adminlogin.php?pesan=sukses");
            } else {
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</buttn.</div>';
            }
        }
    }
}
?>


            
                <!-- Add other employee data fields here -->
                <form class="form-horizontal" action="" method="post">
    <!-- Modify form fields to match your employee data fields -->
    <div class="form-group">
        <label class="col-sm-3 control-label">Fullname</label>
        <div class="col-sm-4">
            <input type="text" name="fullname" class="form-control" required value="<?php echo $row['fullname']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Department</label>
        <div class="col-sm-4">
            <input type="text" name="department" class="form-control" required value="<?php echo $row['department']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Position</label>
        <div class="col-sm-4">
            <input type="text" name="position" class="form-control" required value="<?php echo $row['position']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-4">
            <input type="email" name="email" class="form-control" required value="<?php echo $row['email']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-4">
            <input type="tel" name="phone" class="form-control" required value="<?php echo $row['phone']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Birthday</label>
        <div class="col-sm-4">
            <input type="date" name="birthday" class="form-control" required value="<?php echo $row['birthday']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Gender</label>
        <div class="col-sm-4">
            <input type="text" name="gender" class="form-control" required value="<?php echo $row['gender']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Home Address</label>
        <div class="col-sm-4">
            <input type="text" name="homeaddress" class="form-control" required value="<?php echo $row['homeaddress']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Hire Day</label>
        <div class="col-sm-4">
            <input type="date" name="hireday" class="form-control" required value="<?php echo $row['hireday']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Salary</label>
        <div class="col-sm-4">
            <input type="number" name="salary" class="form-control" required value="<?php echo $row['salary']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Save">
            <a href="adminlogin.php" class="btn btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</form>

    <!-- Add your JavaScript references here as needed -->

</body>
</html>