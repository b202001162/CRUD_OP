<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $instituteName = $_POST['instituteName'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $CGPA = $_POST['CGPA'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $mobileNumber = $_POST['mobileNumber'];
    $gender = $_POST['gender'];
    $id = $_GET['id'];

    if (empty($email)) {
        $emailError = "Email is required";
    } else {
        $emailError = "";
    }
    if (empty($firstName)) {
        $firstNameError = "First Name is required";
    } else {
        $firstNameError = "";
    }
    if (empty($lastName)) {
        $lastNameError = "Last Name is required";
    } else {
        $lastNameError = "";
    }
    if (empty($instituteName)) {
        $instituteNameError = "Institute Name is required";
    } else {
        $instituteNameError = "";
    }
    if (empty($city)) {
        $cityError = "City is required";
    } else {
        $cityError = "";
    }
    if (empty($state)) {
        $stateError = "State is required";
    } else {
        $stateError = "";
    }
    if (empty($CGPA)) {
        $CGPAError = "CGPA is required";
    } else {
        $CGPAError = "";
    }
    if (empty($dateOfBirth)) {
        $dateOfBirthError = "Date of Birth is required";
    } else {
        $dateOfBirthError = "";
    }
    if (empty($mobileNumber)) {
        $mobileNumberError = "Mobile Number is required";
    } else {
        $mobileNumberError = "";
    }
    if (empty($gender)) {
        $genderError = "Gender is required";
    } else {
        $genderError = "";
    }

    if ($emailError == "" && $firstNameError == "" && $lastNameError == "" && $instituteNameError == "" && $cityError == "" && $stateError == "" && $CGPAError == "" && $dateOfBirthError == "" && $mobileNumberError == "" && $genderError == "") {
        $sql = "UPDATE students SET email = '$email', firstName = '$firstName', lastName = '$lastName', instituteName = '$instituteName', city = '$city', state = '$state', CGPA = '$CGPA', dateOfBirth = '$dateOfBirth', mobileNumber = '$mobileNumber', gender = '$gender' WHERE id = $id";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "Record updated successfully";
            header('location: view.php');
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}

// check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // display the record from the database
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $instituteName = $row['instituteName'];
            $city = $row['city'];
            $state = $row['state'];
            $CGPA = $row['CGPA'];
            $email = $row['email'];
            $dateOfBirth = $row['dateOfBirth'];
            $mobileNumber = $row['mobileNumber'];
            $gender = $row['gender'];
        }
    }
}

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
        <h2 class="mb-3">Edit Operation</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" name="id" disabled value=<?php if (isset($id)) {
                    echo $id;
                } else {
                    echo "";
                } ?>>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    value=<?php if (!isset($emailError) && isset($email)) {
                        echo $email;
                    } else {
                        echo "";
                    } ?>>
                <?php if (isset($emailError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$emailError</small>";
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value=<?php
                if (!isset($firstNameError) && isset($firstName)) {
                    echo $firstName;
                } else {
                    echo "";
                } ?>>
                <?php if (isset($firstNameError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$firstNameError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value=<?php if (!isset($lastNameError) && isset($lastName)) {
                    echo $lastName;
                } else {
                    echo "";
                } ?>>
                <?php if (isset($lastNameError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$lastNameError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="instituteName" class="form-label">Institute Name</label>
                <input type="text" class="form-control" id="instituteName" name="instituteName" value=<?php if (!isset($instituteNameError) && isset($instituteName)) {
                    echo $instituteName;
                } else {
                    echo "";
                } ?>>
                <?php if (isset($instituteNameError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$instituteNameError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value=<?php if (
                    !isset($cityError) && isset($city)
                ) {
                    echo $city;
                } else {
                    echo "";
                } ?>>
                <?php if (isset($cityError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$cityError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value=<?php
                if (!isset($stateError) && isset($state)) {
                    echo $state;
                } else {
                    echo "";
                }
                ?>>
                <?php if (isset($stateError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$stateError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="CGPA" class="form-label">CGPA</label>
                <input type="text" class="form-control" id="CGPA" name="CGPA" value=<?php
                if (!isset($CGPAError) && isset($CGPA)) {
                    echo $CGPA;
                } else {
                    echo "";
                }
                ?>>
                <?php if (isset($CGPAError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$CGPAError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="dateOfBirth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value=<?php
                if (!isset($dateOfBirthError) && isset($dateOfBirth)) {
                    echo $dateOfBirth;
                } else {
                    echo "";
                } ?>>
                <?php if (isset($dateOfBirthError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$dateOfBirthError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value=<?php
                if (!isset($mobileNumberError) && isset($mobileNumber)) {
                    echo $mobileNumber;
                } else {
                    echo "";
                }
                ?>>
                <?php if (isset($mobileNumberError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$mobileNumberError</small>";
                } ?>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gander</label>
                <select class="form-control" id="gender" name="gender" value=<?php
                if (!isset($genderError) && isset($gender)) {
                    echo $gender;
                } else {
                    echo "";
                }
                ?>>
                    <option value="male" id="male">Male</option>
                    <option value="female" id="female">Female</option>
                    <option value="other" id="other">Other</option>
                </select>
                <?php if (isset($genderError)) {
                    echo "<small id='emailHelp' class='form-text text-danger'>$genderError</small>";
                } ?>
            </div>
            <input type="submit" value="submit" class="btn btn-primary" name="submit" />
        </form>
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