<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Manage Medicine</title>
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
                                <a class="nav-link" href="../manage_data.php">Home</a>
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
        <h1 class="display-4">Manage Medicine's Data</h1>
        <div class="container">
            <p class="lead text-justify text-center">You can keep track of all the medicines available in the hospital using the following tools.</p>
            <a class="btn btn-outline-primary" href="/manage/secondary/medicine_secondary.php">Medicine Additional Info</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">View Medicine's Info</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <?php
                showmeds();
                function showmeds(){
                    global $conn;
                    $sql = "SELECT * FROM medicine_info";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        show($result);
                    }else{
                        echo "<p class='lead'>There are no medicine's</p>";
                    }
                }
                function show($result){
                    echo '<table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                    <tr>
                    <th>Medicine name</th>
                    <th>Quantity</th>
                    <th>MG</th>
                    <th>Description</th>
                    <th>Price</th>
                    </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()){
                        
                        echo "<tr><td>".$row['name']."</td><td>".$row['quantity']."</td><td>".$row['mg']."</td><td>".$row["description"]."</td><td>".$row["price"]."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Add Medicine's</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <form method="POST" action="manage_medicine.php">
                <div class="form-group">
                    <input type="text" class="form-control my-2" name="mname" placeholder="Medicine's name">
                    <input type="number" class="form-control my-2" name="quantity" placeholder="Quantity">
                    <input type="number" class="form-control my-2" name="mg" placeholder="MG">
                    <input type="text" class="form-control my-2" name="des" placeholder="Description">
                    <input type="number" class="form-control my-2" name="price" placeholder="Price">
                    <input type="submit" class="form-control my-2 btn btn-outline-primary" value="Add Medicine" name="add">
                </div>
            </form>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Update Medicine's Information</h1>
        <p class="text-justify lead">Please select the information that you want to update with the information that you want it to change it to.</p>
        <div class="container text-center col-lg-7 col-xl-7">
            <form method="POST" action="manage_medicine.php">
                <div class="form-group">
                    <input type="text" class="form-control my-2" name="oldval" placeholder="Enter old value">
                    <label for="column">Select Information to change</label>
                    <select class="form-control my-2" name="column" id="column">
                        <option value="name">Medicine name</option>
                        <option value="quantity">Quantity</option>
                        <option value="mg">MG</option>
                        <option value="description">Description</option>
                        <option value="price">Price</option>
                    </select>
                    <input type="text" class="form-control my-2" name="newval" placeholder="Enter new value">
                    <input type="submit" class="form-control my-2 btn btn-outline-primary" value="Update" name="update">
                </div>
            </form>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Delete Medicine's Information</h1>
        <div class="container text-center col-lg-7 col-xl-7">
            <div class="form-group">
                <form method="POST" action="manage_medicine.php">
                    <label for="del_val">Select medicine's name to delete</label>
                        <select class="form-control my-2" name="delval" id="del_val">
                            <?php
                                dispoption();
                                function dispoption(){
                                    global $conn;
                                    $sql = "SELECT name FROM medicine_info";
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
            add_med();
        }
        if(isset($_POST["update"])){
            update_med();
        }
        if(isset($_POST["delete"])){
            delete();
        }
        function add_med(){
            global $conn;
            $mname = $_POST["mname"];
            $quantity = $_POST["quantity"];
            $mg = $_POST["mg"];
            $des= $_POST["description"];
            $price = $_POST["price"];
            if(($mname and $quantity and $mg and $des and $price) != NULL){
                $sql = "INSERT INTO medicine_info VALUES ('$mname',$quantity,$mg,'$des',$price)";
                $conn->query($sql);
            }
        }
        function update_med(){
            global $conn;
            $oldval = $_POST["oldval"];
            $column = $_POST["column"];
            $newval = $_POST["newval"];
            $sql = "UPDATE medicine_info SET $column='$newval' WHERE $column='$oldval'";
            $conn->query($sql);
        }
        function delete(){
            global $conn;
            if(isset($_POST["delval"])){
                $val = $_POST["delval"];
                $sql = "DELETE FROM medicine_info WHERE name='$val'";
                $conn->query($sql);
                $sql = "SELECT * FROM medicine_secondary WHERE name='$val'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    deleteadd($val);
                }
            }
            function deleteadd($val){
                global $conn;
                $sql = "DELETE FROM medicine_secondary WHERE name='$val'";
                $conn->query($sql);
            }
        }
    ?>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>