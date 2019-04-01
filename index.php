<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>HMS</title>
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
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#obj">Objective</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pro">Problems</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#dev">Developer</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </navbar>
    </div>

    <div class="container jumbotron text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Welcome to HMS!</h1>
        <div class="container text-center">
            <p class="lead">Please use the following link or the link provided in the navbar to manage your hospitals data.</p>
            <a href="/manage_data.php" class="btn btn-outline-primary">Manage Hospitals Data</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6" id="about">
        <h1 class="display-4">What is HMS?</h1>
        <div class="container text-center">
            <p class="lead text-justify">The purpose of hospital management system is to automate the existing manual system by the help of computerized equipments and full fledged computer software,
             fullfilling their requirements. So that their valuable data information can be stored for a longer peiod with easy accessing and manipulation of the same.
              The required software and hardware are easily available and easy to work with.</p>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6" id="obj">
        <h1 class="display-4">Objectives of HMS</h1>
        <div class="container text-center">
            <ul class="list-group">
                <li class="list-group-item">Hospital Management System is to manage the details of the hospital</li>
                <li class="list-group-item">It manages all the information about hospital, medicines, tests.</li>
                <li class="list-group-item">The purpose of this project is to build an application program to reduce the manual 
                work for managing the hospital, doctors, medicines, patients etc.</li>
                <li class="list-group-item">Tracks all the details about the patients, employees and tests.</li>
            </ul>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6" id="pro">
        <h1 class="display-4">Problems</h1>
        <div class="container text-center">
            <ul class="list-group">
                <li class="list-group-item">Keeping record for longer duration is difficult.</li>
                <li class="list-group-item">Standing in the queue for taking the appointment.</li>
            </ul>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6" id="dev">
        <h1 class="display-4">About the developer</h1>
        <div class="container text-center">
            <p class="lead">This project is developed by Yajya Pandey of BCA VI SEM. Languages used are,</p>
            <ul class="list-group">
                <li class="list-group-item">HTML</li>
                <li class="list-group-item">CSS</li>
                <li class="list-group-item">Bootstrap</li>
                <li class="list-group-item">Javascript</li>
                <li class="list-group-item">MySQL</li>
                <li class="list-group-item">PHP</li>
            </ul>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>