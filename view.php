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

                //define total number of results you want per page  
                $resultsPerPage = 10;

                //find the total number of results stored in the database  
                $sql = "SELECT * FROM students";
                $result = mysqli_query($connection, $sql);
                $numberOfResults = mysqli_num_rows($result);

                //determine the total number of pages available  
                $numberOfPages = ceil($numberOfResults / $resultsPerPage);

                //determine which page number visitor is currently on  
                $page = 1;
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                //determine the sql LIMIT starting number for the results on the displaying page  
                $pageWiseResult = ($page - 1) * $resultsPerPage;

                //retrieve the selected results from database   
                $query = "SELECT * FROM students LIMIT " . $pageWiseResult . ',' . $resultsPerPage;
                $result = mysqli_query($connection, $query);

                // //display the retrieved result on the webpage  
                // while ($row = mysqli_fetch_array($result)) {
                //     echo $row['id'] . ' ' . $row['firstName'] . '</br>';
                // }
                
                // $sql = "SELECT * FROM students";
                // $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $rowNumber = $pageWiseResult + 1;
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
                        <th scope="row">' . $rowNumber . "</th>
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
                            <button type="button" class="btn btn-danger rounded" data-toggle="modal" data-target="#exampleModal" onClick={handleDelete('.$id.')}>
  Delete
</button>
                        </div>
                    </td></tr>';
                        $rowNumber++;
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
        </table>
        <?php
        //display the link of the pages in URL  
        // pagination in bootstrap
        if (!isset($page) || $page == 1) {
            $page = 1;
        }
        $nextPage = $page + 1;
        if ($nextPage > $numberOfPages) {
            $nextPage = $numberOfPages;
        }
        $currentPage = $page;
        $previousPage = $page - 1;
        if ($previousPage < 1) {
            $previousPage = 1;
        }
        echo '<nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link mr-3" href="view.php?page=' . $previousPage . '" ' . '>Previous</a></li>';
        for ($page = 1; $page <= $numberOfPages; $page++) {
            echo '<a class="btn mr-1 rounded inactiveButton" href="view.php?page=' . $page . '" id="page' . $page . '" >' . $page . '</a>';
        }
        echo '<li class="page-item ml-3"><a class="page-link" href="view.php?page=' . $nextPage . '" ' . '>Next</a></li>
        </ul>
        </nav>';

        // make the current page number active
        echo '<script>
        var pageId = "page' . $currentPage . '";
        document.getElementById(pageId).classList.add("activeTab");
        </script>';

        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete the row</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you really want to delete the row?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" id="deleteButton" >Delete</a>
                </div>
            </div>
        </div>
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
    <script>
        function handleDelete(id) {
            console.log(id);
            // add href to the id = deleteDutton <a> tag
            document.getElementById('deleteButton').href = 'delete.php?id=' + id;
        }
    </script>
</body>

<style>
    .inactiveButton {
        color: #007bff;
        border-radius: 8px;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
    }

    .activeTab {
        color: #007bff;
        border-radius: 8px;
        background-color: #e9ecef;
        border: 1px solid #dee2e6;
    }
</style>

</html>