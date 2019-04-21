<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>My appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <?php
        if(!isset($_COOKIE["user"])){
        echo "<div class='container jumbotron text-center mt-2'>
        <p class='lead'>Please login back in again to continue browsing our Hopsital!</p>
        </div>";
        exit();
        }
    ?>

    <div class="navbar-section home">
        <navbar class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand">HMS</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#toggle"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="toggle">
                    <div class="navbar-menu ml-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="user_page.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </navbar>
    </div>

    <div class="appointment d-flex flex-column align-items-center">
        <div class="container text-center text-justify my-4">
        <h1 class="display-4">My appointments</h1>
            <?php
                include "connect.php";
                showappoint();
                function showappoint(){
                    global $conn;
                    $user = $_COOKIE["user"];
                    $sql = "SELECT * FROM appointment WHERE name='$user'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        show($result);
                    }else{
                        echo "<p class='lead'>You dont have any appointments</p>";
                    }
                }
                function show($result){
                    echo '<table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                    <tr>
                    <th>Patient Name</th>
                    <th>Department</th>
                    <th>Appointment Time</th>
                    </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row['name']."</td><td>".$row['department']."</td><td>".$row["time"]."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>

        <div class="container text-center text-justify col-lg-5 col-xl-5 my-4">
            <h1 class="display-4">Reschedule Appointment Time</h1>
            <div class="form-group">
                <form action="myappointment.php" method="POST">
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
                    $user = $_COOKIE["user"];
                    $time = $_POST["time"];
                    if($time != NULL){
                        $sql = "UPDATE appointment SET time='$time' WHERE name='$user'";
                        $conn->query($sql);
                        echo "<p class='lead text-danger'>Your appointment has been rescheduled</p>";
                        header("Location: myappointment.php");
                    }else{
                        echo "<p class='lead text-danger'>Please check the time before rescheduling</p>";
                    }
                }
            ?>
        </div>

        <div class="container text-center text-justify my-4">
            <h1 class="display-4">Cancel Appointment</h1>
            <div class="form-group">
                <form action="myappointment.php" method="POST">
                    <input type="submit" value="Cancel appointment" name="cancel" class="btn btn-outline-danger">
                </form>
            </div>
            <?php
                if(isset($_POST["cancel"])){
                    cancel();
                }
                function cancel(){
                    global $conn;
                    $user = $_COOKIE["user"];
                    $sql = "DELETE FROM appointment WHERE name='$user'";
                    echo "<p class='lead text-danger'>Your appointment has been canceled!</p>";
                    $conn->query($sql);
                    header("Location: myappointment.php");
                }
            ?>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>