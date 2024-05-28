<?php

include 'config.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Create Operation</title>
</head>

<body>
    <div class="container mb-3 mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Institute name</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">CGPA</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $first_name = $row['firstName'];
                        $last_name = $row['lastName'];
                        $institute_name = $row['instituteName'];
                        $city = $row['city'];
                        $state = $row['state'];
                        $cgpa = $row['CGPA'];
                        $email = $row['email'];
                        $dob = $row['dateOfBirth'];
                        $mobile = $row['mobileNumber'];
                        $gender = $row['gender'];
                        echo '<tr>
                        <th scope="row">' . $id . "</th>
                        <td>" . $first_name . "</td>
                        <td>" . $last_name . '</td>
                        <td>' . $institute_name . '</td>
                        <td>' . $city . '</td>
                        <td>' . $state . '</td>
                        <td>' . $cgpa . '</td>
                        <td>' . $email . '</td>
                        <td>' . $dob . '</td>
                        <td>' . $mobile . '</td>
                        <td>' . $gender . '</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="edit.php?id=' . $id . '" class="btn btn-primary mr-1 rounded">Edit</a>
                            <a href="delete.php?id='.$id.'" class="btn btn-danger rounded">Delete</a>
                        </div>
                    </td></tr>';
                    }
                }

                ?>
            </tbody>
            <tfoot>
                <!-- Add new record button -->
                <tr>
                    <td colspan="12">
                        <a href="create.php" class="btn btn-success rounded">Add new record</a>
                    </td>
                </tr>
            </tfoot>
            <!-- paggination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination
                justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>