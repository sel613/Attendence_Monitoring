<?php

include 'config.php';


if (isset($_POST['submit'])) {

    $shift_id = $_POST['shiftid'];
    $shift_id = filter_var($shift_id, FILTER_SANITIZE_STRING);
    $start = $_POST['start'];
    $start = filter_var($start, FILTER_SANITIZE_STRING);
    $end = $_POST['end'];
    $end = filter_var($end, FILTER_SANITIZE_STRING);
    $gracetime = $_POST['gracetime'];
    $gracetime = filter_var($gracetime, FILTER_SANITIZE_STRING);
    $min_workhours = $_POST['minhours'];
    $min_workhours = filter_var($min_workhours, FILTER_SANITIZE_STRING);
    $shift_type = $_POST['type'];
    $shift_type = filter_var($shift_type, FILTER_SANITIZE_STRING);
    $insert = $conn->prepare("INSERT INTO `shifts`(`shift_id`, `start`, `end`, `gracetime`, `min_workhours`, `shift_type`) VALUES(?,?,?,?,?,?)");
    $insert->execute([$shift_id, $start, $end, $gracetime, $min_workhours, $shift_type]);
    if ($insert) {
        $message[] = 'Shift added successfully!';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #dff6ff;
            background-image: url("https://www.transparenttextures.com/patterns/bright-squares.png");
        }

        .card {
            width: 600px;
        }

        @media only screen and (max-width: 600px) {
            .card {
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card mx-auto my-5 shadow rounded bg-light">
                <h5 class="card-header bg-info">Shift Time</h5>
                <div class="p-2 m-2">
                    <h3 class="card-title text-center">Shift Time-View</h3>
                    <div class="card-body">
                        <div class="border border-2 px-4 py-2 mb-2">
                            <h4 class="my-2">Shift</h4>
                            <div class="mb-2 row">
                                <label for="shiftname" class="col-sm-3 col-form-label">Shift-name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shiftname" id="shiftname" />
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="shiftid" class="col-sm-3 col-form-label">Shift-ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shiftid" id="shiftid" />
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="type" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="type" id="type">
                                        <option value="Day">Day</option>
                                        <option value="Month">Month</option>
                                        <option value="Year">Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border border-2 px-4 py-2 mb-2">
                            <h4 class="my-2">Timing</h4>
                            <div class="mb-2 row">
                                <label for="intime" class="col-sm-3 col-form-label">In time</label>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" name="start" id="intime" />
                                </div>
                                <label for="outtime" class="col-sm-3 col-form-label">Out time</label>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" name="end" id="outtime" />
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="break" checked />
                                <label class="form-check-label mb-2" for="break">
                                    With break hours
                                </label>
                            </div>
                            <div class="mb-2 row">
                                <label for="breakout" class="col-sm-3 col-form-label">Break out</label>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" id="breakout" />
                                </div>
                                <label for="breakin" class="col-sm-3 col-form-label">Break in</label>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" id="breakin" />
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="workhours" class="col-sm-6 col-form-label">Working hours</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="workhours" id="workhours" />
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="minhours" class="col-sm-6 col-form-label">Minimum hours</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="minhours" id="minhours" />
                                </div>
                            </div>
                        </div>
                        <div class="border border-2 px-4 py-2">
                            <h4 class="my-2">Grace-Time</h4>
                            <div class="mb-2 row">
                                <label for="graceintime" class="col-sm-3 col-form-label">In time</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="gracetime" id="graceintime" />
                                </div>
                                <label for="graceouttime" class="col-sm-3 col-form-label">Out time</label>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" id="graceouttime" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <!--  <div class="justify-content-start mb-3">
                            <a href="#" class="btn btn-info m-1">New</a>
                            <a href="#" class="btn btn-info m-1">View</a>
                            <a href="#" class="btn btn-info m-1">Delete</a>
                        </div>-->
                        <div class="justify-content-end">
                            <input type="submit" value="Confirm" class="btn btn-info m-1" name="submit">
                            <a href="#" class="btn btn-info m-1">Clear</a>
                            <a href="admin_page.php" class="btn btn-info m-1">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>