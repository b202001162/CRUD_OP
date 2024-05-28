<?php

include 'config.php';

if (isset($_POST['submit'])) {
    // **Data Validation (improves security)**
    $firstName = trim($_POST['firstName']);
    if (empty($firstName)) {
        $firstNameError = "First Name is required";
    } else {
        // remove the error
        unset($firstNameError);
    }
    $lastName = trim($_POST['lastName']);
    if (empty($lastName)) {
        $lastNameError = "Last Name is required";
    } else {
        // remove the error
        unset($lastNameError);
    }
    $instituteName = trim($_POST['instituteName']);
    if (empty($instituteName)) {
        $instituteNameError = "Institute Name is required";
    } else {
        // remove the error
        unset($instituteNameError);
    }
    $city = trim($_POST['city']);
    if (empty($city)) {
        $cityError = "City is required";
    } else {
        // remove the error
        unset($cityError);
    }
    $state = trim($_POST['state']);
    if (empty($state)) {
        $stateError = "State is required";
    } else {
        // remove the error
        unset($stateError);
    }

    // CGPA might require additional validation to ensure it's a number
    $CGPA = trim($_POST['CGPA']);
    if (empty($CGPA)) {
        $CGPAError = "CGPA is required";
    } else {
        // remove the error
        unset($CGPAError);
    }

    $email = trim($_POST['email']);
    if (empty($email)) {
        $emailError = "Email is required";
    } else {
        // remove the error
        unset($emailError);
    }
    $dateOfBirth = trim($_POST['dateOfBirth']);
    if (empty($dateOfBirth)) {
        $dateOfBirthError = "Date of Birth is required";
    } else {
        // remove the error
        unset($dateOfBirthError);
    }
    $mobileNumber = trim($_POST['mobileNumber']);
    if (empty($mobileNumber)) {
        $mobileNumberError = "Mobile Number is required";
    } else {
        // remove the error
        unset($mobileNumberError);
    }
    $gender = trim($_POST['gender']);
    if (empty($gender)) {
        $genderError = "Gender is required";
    } else {
        // remove the error
        unset($genderError);
    }

    if (!isset($emailError) && !isset($firstNameError) && !isset($lastNameError) && !isset($instituteNameError) && !isset($cityError) && !isset($stateError) && !isset($CGPAError) && !isset($dateOfBirthError) && !isset($mobileNumberError) && !isset($genderError)) {
        // Prepare the SQL statement with prepared statements (improves security)
        $sql = "INSERT INTO students (firstName, lastName, instituteName, city, state, CGPA, email, dateOfBirth, mobileNumber, gender) VALUES ('$firstName', '$lastName', '$instituteName', '$city', '$state', $CGPA, '$email', '$dateOfBirth', '$mobileNumber', '$gender');";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            echo "<script>alert('New record created successfully');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }

    $connection->close();
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
        <h2 class="mb-3">Create Operation</h2>
        <form action="" method="POST">
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
                if (!isset($firstNameError) && isset($firstName) ) {
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