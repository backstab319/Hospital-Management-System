<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Blood Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
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
                                <a class="nav-link" href="">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </navbar>
    </div>

    <div class="blood_donation d-flex align-items-start flex-row">
        <div class="container text-justify text-center col-lg-4 col-xl-4">
            <h1 class="display-4 text-danger">Blood Bank</h1>
            <p class="lead text-danger">You can take appointment to donate blood at our hospital or request blood in case of emergency</p>
            <div class="form-group">
                <form action="blood_bank.php" method="POST">
                    <input type="text" class="form-control mb-2" name="name" placeholder="Full name">
                    <input type="number" class="form-control mb-2" name="phone" placeholder="Phone number">
                    <input type="number" class="form-control mb-2" name="age" placeholder="Age">
                    <label for="sex" class="text-danger">Please select gender:</label>
                    <select name="sex" id="sex" class="form-control mb-2">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <label for="blood" class="text-danger">Please select blood group:</label>
                    <select class="form-control my-2" name="blood_group" id="blood">
                        <option value="A pos">A pos<option>
                        <option value="B pos">B pos<option>
                        <option value="AB pos">AB pos<option>
                        <option value="O pos">O pos<option>
                        <option value="A neg">A neg<option>
                        <option value="B neg">B neg<option>
                        <option value="AB neg">AB neg<option>
                        <option value="O neg">O neg<option>
                    </select>
                    <input type="number" class="form-control mb-2" name="weight" placeholder="Weight">
                    <input type="submit" value="Donate Blood" name="donate" class="form-control mb-2 btn btn-danger">
                </form>
            </div>
            <?php
                include "connect.php";
                if(isset($_POST["donate"])){
                    donate();
                }
                function donate(){
                    global $conn;
                    $name = $_POST["name"];
                    $phone = $_POST["phone"];
                    $age = $_POST["age"];
                    $sex = $_POST["sex"];
                    $group = $_POST["blood_group"];
                    $weight = $_POST["weight"];
                    if(($name and $phone and $age and $sex and $group and $weight) != NULL){
                        $sql = "INSERT INTO blood_donation VALUES('$name','$phone','$age','$sex','$group','$weight')";
                        $conn->query($sql);
                        echo "<p class='lead text-danger'>Your form has been registered successfully!</p>";
                    }else{
                        echo "<p class='lead text-danger'>Please check your form before submitting</p>";
                    }
                }
            ?>
        </div>
        <div class="container text-justify text-center col-lg-4 col-xl-4">
            <h1 class="display-4 text-danger">Request emergency blood</h1>
            <p class="lead text-danger">Please fill out the below form to request blood in case of emergency and we will get in 
                touch with you shortly</p>
            <form action="blood_bank.php" method="POST">
                <input type="text" name="name" placeholder="Full Name" class="form-control mb-2">
                <input type="number" class="form-control mb-2" name="phone" placeholder="Phone number">
                <label for="blood" class="text-danger"><span class="text-light">Pl</span>ease select blood group:</label>
                <select class="form-control my-2" name="blood_group" id="blood">
                    <option value="A pos">A pos<option>
                    <option value="B pos">B pos<option>
                    <option value="AB pos">AB pos<option>
                    <option value="O pos">O pos<option>
                    <option value="A neg">A neg<option>
                    <option value="B neg">B neg<option>
                    <option value="AB neg">AB neg<option>
                    <option value="O neg">O neg<option>
                </select>
                <input type="submit" value="Request blood" name="req" class="btn btn-danger">
            </form>
            <?php
            if(isset($_POST["req"])){
                request();
            }
            function request(){
                global $conn;
                $name = $_POST["name"];
                $number = $_POST["phone"];
                $group = $_POST["blood_group"];
                if(($name and $number and $group) != NULL){
                    $sql = "INSERT INTO blood_request VALUES('$name','$number','$group')";
                    $conn->query($sql);
                    echo "<p class='lead text-danger'>Your blood request form has been submitted. We will get in touch with you ASAP.</p>";
                }else{
                    echo "<p class='lead text-danger'>Please check your form before submitting</p>";
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