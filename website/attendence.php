<?php

include 'config.php';
$query = $conn->prepare("select * from attendance ");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="card mx-auto my-3 shadow rounded bg-light">
            <div class="p-1 m-1">
                <div class="card-body">
                    <div class="border border-2 px-4 py-2 mb-2">
                        <h2 class="h2 text-center m-2 mb-4">TIMELINE</h2>
                        <form action="" method="post">
                            <div class="mb-2 row">
                                <label for="location" class="col-sm-2 col-form-label">Department</label>
                                <div class="col-sm-3">
                                    <select class="form-select" id="location" name="dept">
                                        <option value="1">EDP</option>
                                        <option value="2">SALES</option>
                                        <option value="3">EMBROIDARY</option>
                                    </select>
                                </div>
                                <label for="search" class="col-sm-2 col-form-label">Search</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="search" />
                                </div>


                            </div>
                            <!-- <div class="mb-2 row">
                                <label for="date" class="col-sm-2 col-form-label">From Date</label>
                                <div class="col-sm-3">
                                    <input type="date" name="date" class="form-control" id="date" />
                                </div>
                                <label for="date" class=" col-sm-2 col-form-label">Attend Date</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="date" />
                                </div>
                                <button type="submit" name='view'>View</button>
                            </div> -->
                            <div class="text-center"><button type="submit" name='view' class="">View</button></div>

                        </form>
                    </div>
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
                    if (isset($_POST['view'])) {
                        echo  $date = $_POST['date'];
                        echo  $dept = $_POST['dept'];

                        $sql = "SELECT * FROM attendance WHERE  dept_id='$dept'";
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

                                <td><?php echo "00:15:00" ?></td>
                                <td><?php echo "P" ?></td>
                                <td><?php echo $rows['date']; ?></td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center m-3">
            <a onclick="window.print();" target="_blank" style="cursor:pointer;" class="btn btn-info fs-5 mx-2">Report</a>

            <a href="admin_page.php" class="btn btn-info fs-5 mx-2">Close</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>