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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
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
                    <form action="" method="post">
                        <div class="mb-2 row">
                            <label for="date" class="col-sm-2 col-form-label">From Date</label>
                            <div class="col-sm-3">
                                <input type="date" name="fromdate" class="form-control" id="date" />
                            </div>
                            <label for="date" class=" col-sm-2 col-form-label">To Date</label>
                            <div class="col-sm-3">
                                <input type="date" name="todate" class="form-control" id="date" />
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" name='view' class="">View</button></div>

                    </form>
                    </section>


                </div>
            </div>
        </div>
        <div class="container bg-light p-2 shadow rounded scrollbar">
            <table class="table table-hover table-bordered" id="ex_table">
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
                        <th scope="col">BRK MINS</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">DATE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['view'])) {
                        $fromdate = $_POST['fromdate'];
                        $todate = $_POST['todate'];
                        if ($fromdate != NULL && $todate != NULL) {

                            $sql = "SELECT * FROM attendance WHERE ( emp_id='$user_id' AND( date_ BETWEEN '$fromdate' AND '$todate'))";
                        }
                        $r = $conn->prepare($sql);
                        $r->setFetchMode(PDO::FETCH_ASSOC);
                        $r->execute();

                        while ($rows = $r->fetch()) {
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
                                <?php
                                $time1 = new DateTime($rows['break_in']);
                                $time2 = new DateTime($rows['break_out']);
                                $interval = $time1->diff($time2);
                                $difference = date_diff($time1, $time2);
                                $minutes = $difference->days * 24 * 60;
                                $minutes += $difference->h * 60;
                                $minutes += $difference->i;
                                ?>
                                <td><?php echo $minutes ?></td>
                                <?php
                                $time1 = new DateTime($rows['in_time']);
                                $time2 = new DateTime($rows['out_time']);
                                $interval = $time1->diff($time2);
                                $difference = date_diff($time1, $time2);
                                $minutes = $difference->days * 24 * 60;
                                $minutes += $difference->h * 60;
                                $minutes += $difference->i;
                                ?>
                                <td><?php if ($minutes / 60 >= 8) {
                                        echo "P";
                                    } else {
                                        echo "X";
                                    } ?></td>
                                <td><?php echo $rows['date_']; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
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
                                <?php
                                $difference1 = date_diff(new DateTime($rows['out_time']), new DateTime($rows['in_time']));
                                $minutes1 = $difference1->days * 24 * 60;
                                $minutes1 += $difference1->h * 60;
                                $minutes1 += $difference1->i;
                                $difference = date_diff(new DateTime($rows['break_in']), new DateTime($rows['break_out']));
                                $minutes = $difference->days * 24 * 60;
                                $minutes += $difference->h * 60;
                                $minutes += $difference->i;
                                ?>
                                <td><?php echo ($minutes1 / 60) - ($minutes / 60); ?>
                                </td>

                                <td><?php echo $minutes ?></td>
                                <td><?php if ((($minutes1 / 60) - ($minutes / 60)) > 8) {
                                        echo "P";
                                    } else {
                                        echo "X";
                                    }   
                                    ?></td>
                                <td><?php echo $rows['date_']; ?></td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center m-3">
            <a onclick="generate()" target="_blank" style="cursor:pointer;" class="btn btn-info fs-5 mx-2">Report</a>
            <!-- <a href="#" class="btn btn-info fs-5 mx-2">Clear</a> -->
            <a href="user_page.php" class="btn btn-info fs-5 mx-2">Close</a>
        </div>
    </div>
    <script>
        function generate() {
            var doc = new jsPDF('p', 'pt', 'A4');
            var htmlstring = '';
            var tempVarToCheckPageHeight = 0;
            var pageHeight = 0;
            pageHeight = doc.internal.pageSize.height;
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector  
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"  
                    return true
                }
            };
            margins = {
                top: 50,
                bottom: 50,
                left: 10,
                right: 10,
                width: 600
            };
            var y = 20;
            doc.setLineWidth(2);
            doc.text(200, y = y + 30, "Attendence Report");
            doc.autoTable({
                html: '#ex_table',
                startY: 30,
                theme: 'grid',

                styles: {
                    minCellHeight: 10
                }
            })
            doc.save('Attendence_Report.pdf');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>