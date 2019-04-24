<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Patient Additional Info</title>
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
                                <a class="nav-link" href="../../manage_data.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </navbar>
    </div>

    <?php
        include "../../connect.php";
    ?>

    <div class="container jumbotron text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Manage Patient's Additional Data</h1>
        <div class="container">
            <p class="lead text-justify text-center">The Patient's Additional Data can be managed using the following provided tools.</p>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">View Patient's Additional Info</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <?php
                showpatadditional();
                function showpatadditional(){
                    global $conn;
                    $sql = "SELECT * FROM patient_secondary";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        show($result);
                    }else{
                        echo "<p class='lead'>Patient's Additional data are not available!</p>";
                    }
                }
                function show($result){
                    echo '<table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                    <tr>
                    <th>Patient name</th>
                    <th>Consulted Doctor</th>
                    <th>Previous Diagnosis</th>
                    </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()){
                        
                        echo "<tr><td>".$row['name']."</td><td>".$row['consulted_doctor']."</td><td>".$row['prev_diagnosis']."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6" id="add">
        <h1 class="display-4">Add Patient's Additional Information</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <form method="POST" action="patient_secondary.php">
                <div class="form-group">
                    <input type="text" class="form-control my-2" name="name" placeholder="Patient's name">
                    <input type="text" class="form-control my-2" name="consulted_doctor" placeholder="Consulted Doctor">
                    <input type="text" class="form-control my-2" name="prev_diagnosis" placeholder="Diagnosis">
                    <input type="submit" class="form-control my-2 btn btn-outline-primary" value="Add Patient" name="add">
                </div>
            </form>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6" id="update">
        <h1 class="display-4">Update Patient's Additional Information</h1>
        <p class="text-justify lead">Please select the information that you want to update with the information that you want it to change it to.</p>
        <div class="container text-center col-lg-7 col-xl-7">
            <form method="POST" action="patient_secondary.php">
                <div class="form-group">
                    <input type="text" class="form-control my-2" name="oldval" placeholder="Enter old value">
                    <label for="column">Select Information to change</label>
                    <select class="form-control my-2" name="column" id="column">
                        <option value="consulted_doctor">Consulted Doctor</option>
                        <option value="prev_diagnosis">Previous Diagnosis</option>
                    </select>
                    <input type="text" class="form-control my-2" name="newval" placeholder="Enter new value">
                    <input type="submit" class="form-control my-2 btn btn-outline-primary" value="Update" name="update">
                </div>
            </form>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6" id="delete">
        <h1 class="display-4">Delete Patient's Additional Information</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <div class="form-group">
                <form method="POST" action="patient_secondary.php">
                    <label for="del_val">Select patient's name to delete</label>
                        <select class="form-control my-2" name="delval" id="del_val">
                            <?php
                                dispoption();
                                function dispoption(){
                                    global $conn;
                                    $sql = "SELECT name FROM patient_secondary";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){
                                            echo "<option value=".$row["name"].">".$row["name"]."</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    <input type="submit" class="form-control my-2 btn btn-outline-primary" value="Delete" name="delete">
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST["add"])){
            add_patadditional();
            echo "<script type='text/javascript'>document.location = 'patient_secondary.php/#add';</script>";
        }
        if(isset($_POST["update"])){
            update_patadd();
            echo "<script type='text/javascript'>document.location = 'patient_secondary.php/#update';</script>";
        }
        if(isset($_POST["delete"])){
            delete();
            echo "<script type='text/javascript'>document.location = 'patient_secondary.php/#delete';</script>";
        }
        function delete(){
            global $conn;
            if(isset($_POST["delval"])){
                $val = $_POST["delval"];
                $sql = "DELETE FROM patient_secondary WHERE name='$val'";
                $conn->query($sql);
            }
        }
        function update_patadd(){
            global $conn;
            $oldval = $_POST["oldval"];
            $column = $_POST["column"];
            $newval = $_POST["newval"];
            $sql = "UPDATE patient_secondary SET $column='$newval' WHERE $column='$oldval'";
            $conn->query($sql);
        }
        function add_patadditional(){
            global $conn;
            $name = $_POST["name"];
            $consulted_doctor = $_POST["consulted_doctor"];
            $prev_diagnosis = $_POST["prev_diagnosis"];
            if(($name and $consulted_doctor and $prev_diagnosis) != NULL){
                $sql = "INSERT INTO patient_secondary VALUES ('$name','$consulted_doctor','$prev_diagnosis')";
                $conn->query($sql);
            }
        }
    ?>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>