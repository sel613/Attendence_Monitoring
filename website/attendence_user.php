<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("select * from attendance where emp_id=$user_id");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #dff6ff;
            background-image: url("https://www.transparenttextures.com/patterns/bright-squares.png");
        }

        .scrollbar {
            position: relative;
            height: 300px;
            overflow: auto;
            display: block;
        }

        .input-group-append {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card mx-auto my-3 shadow rounded bg-light">
            <div class="p-1 m-1">
                <div class="card-body">
                    <?php
                    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                    $select_profile->execute([$user_id]);
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <h3 style="margin-left:40%;">Welcome <?= $fetch_profile['name']; ?></h3>
                    <!-- <div class="border border-2 px-4 py-2 mb-2">
                        <h2 class="h2 text-center m-2 mb-4">TIMELINE</h2>
                        <div class="mb-2 row">
                            <label for="concern" class="col-sm-2 col-form-label">Concern</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="concern">
                                    <option value="1">Value</option>
                                </select>
                            </div>
                            <label for="section" class="offset-sm-1 col-sm-2 col-form-label">Section</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="section">
                                    <option value="1">Value</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="location" class="col-sm-2 col-form-label">Work location</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="location">
                                    <option value="1">Value</option>
                                </select>
                            </div>
                            <label for="date" class="offset-sm-1 col-sm-2 col-form-label">Attend Date</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="date" />
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="search" class="col-sm-2 col-form-label">Search</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="search" />
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lunch" />
                                    <label class="form-check-label mb-2" for="lunch">
                                        Irregular lunch
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <section class="container">
                        <form class="row">
                            <label for="date" class="col-1 col-form-label">From Date</label>
                            <div class="col-5">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" id="date" />
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </section>
                    <section class="container">
                        <form class="row">
                            <label for="date" class="col-1 col-form-label">To Date</label>
                            <div class="col-5">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" id="date" />
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </section> -->


                </div>
            </div>
        </div>
        <div class="container bg-light p-2 shadow rounded scrollbar">
            <table class="table table-hover table-bordered">
                <thead class="bg-info text-light">
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Emp Name</th>
                        <th scope="col">Emp ID</th>
                        <th scope="col">IN TIME</th>
                        <th scope="col">BRK OUT</th>
                        <th scope="col">BRK IN</th>
                        <th scope="col">OUT TIME</th>
                        <th scope="col">WORK HRS</th>
                        <th scope="col">BRK HRS</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">DATE</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($rows = $query->fetch()) {
                    ?>
                        <tr>
                            <td><?php echo $rows['at_id']; ?></td>
                            <td><?php echo $rows['user_name']; ?></td>
                            <td><?php echo $rows['emp_id']; ?></td>
                            <td><?php echo $rows['in_time']; ?></td>
                            <td><?php echo $rows['break_out']; ?></td>
                            <td><?php echo $rows['break_in']; ?></td>
                            <td><?php echo $rows['out_time']; ?></td>
                            <td><?php echo '8'; ?>
                            </td>
                            <td><?php echo "00:15:00" ?></td>
                            <td><?php echo "P" ?></td>
                            <td><?php echo $rows['date']; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center m-3">
            <a onclick="window.print();" target="_blank" style="cursor:pointer;" class="btn btn-info fs-5 mx-2">Report</a>
            <!-- <a href="#" class="btn btn-info fs-5 mx-2">Clear</a> -->
            <a href="user_page.php" class="btn btn-info fs-5 mx-2">Close</a>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datepicker').datepicker();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>