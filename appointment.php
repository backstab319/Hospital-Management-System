<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Appointment</title>
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

    <div class="appointment d-flex align-items-center">
        <div class="container text-center text-justify col-lg-6 col-xl-6">
            <h1 class="display-4">Appointment Form</h1>
            <p class="lead">Please fill out the following form to take an appointment.</p>
            <div class="form-group">
                <form action="appointment.php" method="POST">
                    <input type="number" class="form-control mb-2" name="phone" placeholder="Phone number">
                    <input type="number" class="form-control mb-2" name="age" placeholder="Age">
                    <label for="sex">Please select gender:</label>
                    <select name="sex" id="sex" class="form-control mb-2">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <label for="department">Hospital Department:</label>
                    <select name="department" id="department" class="form-control mb-2">
                        <option value="Neuro">Neuro</option>
                        <option value="OPD">OPD</option>
                        <option value="Ortheopedic">Ortheopedic</option>
                        <option value="Gastric">Gastric</option>
                        <option value="Dermatologist">Dermatologist</option>
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="Eye">Eye</option>
                        <option value="Dental">Dental</option>
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
                    <input type="submit" value="Get appointment" name="appointment" class="btn btn-outline-primary">
                </form>
            </div>
            <?php
            include "connect.php";
            if(isset($_POST["appointment"])){
                appointment();
            }
            function appointment(){
                global $conn;
                $name = $_COOKIE["user"];
                $number = $_POST["phone"];
                $age = $_POST["age"];
                $sex = $_POST["sex"];
                $time = $_POST["time"];
                $dep = $_POST["department"];
                if(($name and $number and $age and $sex and $time and $dep) != NULL){
                    $sql = "INSERT INTO appointment VALUES('$name','$number','$age','$sex','$dep','$time')";
                    $conn->query($sql);
                    echo "<p class='lead text-danger'>Your appointment request has been sent! You will get a call from us for further details.</p>";
                }else{
                    echo "<p class='lead text-danger'>Please check the form before submitting</p>";
                }
            }
        ?>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>