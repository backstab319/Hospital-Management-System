<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Page Title</title>
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
        <h1 class="display-4">Manage Doctor's Data</h1>
        <div class="container">
            <p class="lead text-justify text-center">The Doctor's Data can be managed using the following provided tools.</p>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">View Doctor's Info</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <?php
                showdoctor();
                function showdoctor(){
                    global $conn;
                    $sql = "SELECT * FROM doctor_info";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        show($result);
                    }else{
                        echo "<p class='lead'>There are no doctor's</p>";
                    }
                }
                function show($result){
                    echo '<table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                    <tr>
                    <th>Doctor name</th>
                    <th>Department</th>
                    <th>Number</th>
                    <th>Address</th>
                    </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()){
                        
                        echo "<tr><td>".$row['doctor_name']."</td><td>".$row['department']."</td><td>".$row['phone_number']."</td><td>".$row["address"]."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Add Doctor's Information</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <form method="POST" action="manage_doctor.php">
                <div class="form-group">
                    <input type="text" class="form-control my-2" name="dname" placeholder="Doctor's name">
                    <input type="text" class="form-control my-2" name="dep" placeholder="Department">
                    <input type="number" class="form-control my-2" name="number" placeholder="Phone number">
                    <input type="text" class="form-control my-2" name="address" placeholder="Address">
                    <input type="submit" class="form-control my-2 btn btn-outline-primary" value="Add Doctor" name="add">
                </div>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST["add"])){
            add_doc();
        }
        function add_doc(){
            global $conn;
            $dname = $_POST["dname"];
            $dep = $_POST["dep"];
            $number = $_POST["number"];
            $address= $_POST["address"];
            $sql = "INSERT INTO doctor_info VALUES ('$dname','$dep',$number,'$address')";
            $conn->query($sql);
        }
    ?>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>