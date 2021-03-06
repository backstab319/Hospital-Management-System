<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Manage HMS</title>
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
                                <a class="nav-link" href="/manage/manage_blooddonation.php">Blood Donation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/manage/manage_bloodrequest.php">Blood Request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/manage/manage_appointments.php">Appointments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/manage/manage_medicine.php">Medicine</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/manage/manage_patient.php">Patient</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/manage/manage_tests.php">Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </navbar>
    </div>

    <div class="container jumbotron text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Hospital's data management</h1>
        <div class="container text-center">
            <p class="lead text-justify">Please use the following provided tools to manage the hospitals data. You can change the category from the navbar above.</p>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Manage doctor's data</h1>
        <div class="container text-center">
            <p class="lead text-justify">Using the following link you can add a new doctor, maintain his records, edit their information and also delete them if they are no longer needed.</p>
            <a href="/manage/manage_doctor.php" class="btn btn-outline-primary">Manage Doctor's Data</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Manage Patient's Data</h1>
        <div class="container text-center">
            <p class="lead text-justify">Using the following link you can maintain the information of the patients, their diagnosis, past illness, patient details etc and modify or delete them anytime in the future.</p>
            <a href="/manage/manage_patient.php" class="btn btn-outline-primary">Manage Patient's Data</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Manage Medicine's Data</h1>
        <div class="container text-center">
            <p class="lead text-justify">Using the following link you can manage the available medicines in present in the hospitals inventory. To manage hospitals inventory efficiently.</p>
            <a href="/manage/manage_medicine.php" class="btn btn-outline-primary">Manage Medicine's</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Manage Test's Data</h1>
        <div class="container text-center">
            <p class="lead text-justify">Using the following link you can manage data on the patients tests.</p>
            <a href="/manage/manage_tests.php" class="btn btn-outline-primary">Manage Test's</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Blood Donation</h1>
        <div class="container text-center">
            <p class="lead text-justify text-center">Manage blood donation data</p>
            <a href="/manage/manage_blooddonation.php" class="btn btn-outline-primary">Blood Donation Data</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Blood Emergency Request</h1>
        <div class="container text-center">
            <p class="lead text-justify text-center">Manage blood emergency request</p>
            <a href="/manage/manage_bloodrequest.php" class="btn btn-outline-primary">Blood Donation Data</a>
        </div>
    </div>

    <div class="container text-center my-4 col-lg-6 col-xl-6">
        <h1 class="display-4">Appointments</h1>
        <div class="container text-center">
            <p class="lead text-justify text-center">Manage Appointments</p>
            <a href="/manage/manage_appointments.php" class="btn btn-outline-primary">Appointments</a>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>