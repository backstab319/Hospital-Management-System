<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Manage Appointments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="navbar-section home">
        <navbar class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand">HMS</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#toggle"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="toggle">
                    <div class="navbar-menu ml-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../manage_data.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </navbar>
    </div>

    <div class="container jumbotron text-center text-justify col-lg-6 col-xl-6">
        <h1 class="display-4">View and manage appointments</h1>
        <p class="lead">Please use the following tools to manage the doctor appointments</p>
    </div>

    <div class="container text-center text-justify col-lg-6 col-xl-6">
        <h1 class="display-4">Appointments</h1>
        <?php
                include "../connect.php";
                showappoint();
                function showappoint(){
                    global $conn;
                    $user = $_COOKIE["user"];
                    $sql = "SELECT * FROM appointment";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        show($result);
                    }else{
                        echo "<p class='lead'>There are no appointments</p>";
                    }
                }
                function show($result){
                    echo '<table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                    <tr>
                    <th>Patient Name</th>
                    <th>Department</th>
                    <th>Appointment Time</th>
                    <th>Done</th>
                    </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row['name']."</td><td>".$row['department']."</td><td>".$row["time"]."</td><td><a class='btn btn-outline-primary' href='manage_appointments.php?done=".$row['name']."'>Done</a></td></tr>";
                    }
                    echo "</table>";
                }
                if(isset($_GET["done"])){
                    delete();
                }
                function delete(){
                    global $conn;
                    $val = $_GET["done"];
                    $sql = "DELETE FROM appointment WHERE name='$val'";
                    $conn->query($sql);
                    header("Location: manage_appointments.php");
                }
            ?>
    </div>

    <div class="container text-center text-justify col-lg-6 col-xl-6">
        <div class="form-group">
            <form method="POST" action="manage_doctor.php">
                <label for="up_val">Select patients name to reschedule appointment</label>
                    <select class="form-control my-2" name="upval" id="up_val">
                        <?php
                            dispoption();
                            function dispoption(){
                                global $conn;
                                $sql = "SELECT name FROM appointment";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<option value=".$row["name"].">".$row["name"]."</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                    <label for="time">Time preference:</label>
                    <select name="time" id="time" class="form-control mb-2">
                        <option value="4">4 P.M</option>
                        <option value="5">5 P.M</option>
                        <option value="6">6 P.M</option>
                        <option value="7">7 P.M</option>
                        <option value="8">8 P.M</option>
                        <option value="9">9 P.M</option>
                    </select>
                    <input type="submit" value="Reschedule" name="reschedule" class="btn btn-outline-primary">
            </form>
        </div>
        <?php
            if(isset($_POST["reschedule"])){
                reschedule();
            }
            function reschedule(){
                global $conn;
                $upval = $_POST["upval"];
                $time = $_POST["time"];
                $sql = "UPDATE appointment SET time='$time' WHERE name='$upval'";
                $conn->query($sql);
            }
        ?>
    </div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>