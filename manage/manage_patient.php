<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Manage Patient</title>
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

    <?php
        include "../connect.php";
    ?>

    <div class="container jumbotron text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Manage Patient's Data</h1>
        <div class="container">
            <p class="lead text-justify text-center">The Patient's Data can be managed using the following provided tools.</p>
            <a class="btn btn-outline-primary" href="/manage/secondary/patient_secondary.php">Patient Additional Info</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">View Patient's Info</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <?php
                showpat();
                function showpat(){
                    global $conn;
                    $sql = "SELECT * FROM patient_info";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        show($result);
                    }else{
                        echo "<p class='lead'>Patient's data are not available!</p>";
                    }
                }
                function show($result){
                    echo '<table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                    <tr>
                    <th>Patient name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Weight</th>
                    <th>Phone Number</th>
                    <th>Blood Group</th>
                    </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()){
                        
                        echo "<tr><td>".$row['name']."</td><td>".$row['sex']."</td><td>".$row['age']."</td><td>".$row["weight"]."</td><td>".$row["number"]."</td><td>".$row["blood_group"]."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Add Patient's Information</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <form method="POST" action="manage_patient.php">
                <div class="form-group">
                    <input type="text" class="form-control my-2" name="name" placeholder="Patient's name">
                    <label for="sex">Select Patient's Sex</label>
                    <select class="form-control my-2" name="sex" id="sex">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="number" class="form-control my-2" name="age" placeholder="Patient's Age">
                    <input type="number" class="form-control my-2" name="weight" placeholder="Weight">
                    <input type="number" class="form-control my-2" name="number" placeholder="Phone Number">
                    <label for="blood">Select Patient's Blood Group</label>
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
                    <input type="submit" class="form-control my-2 btn btn-outline-primary" value="Add Patient" name="add">
                </div>
            </form>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Update Patient's Information</h1>
        <p class="text-justify lead">Please select the information that you want to update with the information that you want it to change it to.</p>
        <div class="container text-center col-lg-7 col-xl-7">
            <form method="POST" action="manage_patient.php">
                <div class="form-group">
                    <input type="text" class="form-control my-2" name="oldval" placeholder="Enter old vlaue">
                    <label for="column">Select Information to change</label>
                    <select class="form-control my-2" name="column" id="column">
                        <option value="name">Patient's name</option>
                        <option value="sex">Sex</option>
                        <option value="age">Age</option>
                        <option value="weight">Weight</option>
                        <option value="number">Phone Number</option>
                        <option value="blood_group">Blood Group</option>
                    </select>
                    <input type="text" class="form-control my-2" name="newval" placeholder="Enter new vlaue">
                    <input type="submit" class="form-control my-2" value="Update" name="update">
                </div>
            </form>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Delete Patient's Information</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <div class="form-group">
                <form method="POST" action="manage_patient.php">
                    <label for="del_val">Select patient's name to delete</label>
                        <select class="form-control my-2" name="delval" id="del_val">
                            <?php
                                dispoption();
                                function dispoption(){
                                    global $conn;
                                    $sql = "SELECT name FROM patient_info";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){
                                            echo "<option value=".$row["name"].">".$row["name"]."</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    <input type="submit" class="form-control my-2" value="Delete" name="delete">
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST["add"])){
            add_pat();
        }
        if(isset($_POST["update"])){
            update_pat();
        }
        if(isset($_POST["delete"])){
            delete();
        }
        function delete(){
            global $conn;
            if(isset($_POST["delval"])){
                $val = $_POST["delval"];
                $sql = "DELETE FROM patient_info WHERE name='$val'";
                $conn->query($sql);
                $sql = "SELECT * FROM patient_secondary WHERE doctor_name='$val'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    deleteadd($val);
                }
            }
            function deleteadd($val){
                global $conn;
                $sql = "DELETE FROM patient_secondary WHERE name='$val'";
                $conn->query($sql);
            }
        }
        function update_pat(){
            global $conn;
            $oldval = $_POST["oldval"];
            $column = $_POST["column"];
            $newval = $_POST["newval"];
            $sql = "UPDATE patient_info SET $column='$newval' WHERE $column='$oldval'";
            $conn->query($sql);
        }
        function add_pat(){
            global $conn;
            $name = $_POST["name"];
            $sex = $_POST["sex"];
            $age = $_POST["age"];
            $weight = $_POST["weight"];
            $number = $_POST["number"];
            $blood_group= $_POST["blood_group"];
            if(($name and $sex and $age and $weight and $number and $blood_group) != NULL){
                $sql = "INSERT INTO patient_info VALUES ('$name','$sex',$age,$weight,$number,'$blood_group')";
                $conn->query($sql);
            }
        }
    ?>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>