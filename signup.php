<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Sign up</title>
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
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </navbar>
    </div>

    <div class="background d-flex align-items-center">
    <div class="container col-lg-4 col-xl-4 text-center text-justify">
        <div class="form-group">
            <h1 class="display-4 text-light">Sign up</h1>
            <form action="signup.php" method="POST">
                <input type="text" placeholder="Username" name="username" class="form-control mb-2">
                <input type="password" placeholder="Password" name="password" class="form-control mb-2">
                <input type="password" placeholder="Re enter Password" name="password1" class="form-control mb-2">
                <input type="submit" name="sign" value="Sign up!" class="form-control btn btn-primary">
            </form>
        </div>
        <?php
            include "connect.php";
            if(isset($_POST["sign"])){
                signup();
            }
            function signup(){
                global $conn;
                $username = $_POST["username"];
                $password = $_POST["password"];
                $password1 = $_POST["password1"];
                if(($username and $password and $password1) != NULL){
                    if($password == $password1){
                        $sql = "INSERT INTO login_details VALUES('$username','$password','')";
                        $conn->query($sql);
                        echo "<p class='text-center text-justify lead text-light'>Sign up successfull!</p>";
                    }else{
                        echo "<p class='text-center text-justify lead text-light'>Passwords do not match!</p>";
                    }
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