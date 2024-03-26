<?php
include 'connection.php';

if (isset($_POST['user_type'])) {
    if($_POST['user_type'] == '1'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $id = $_POST['id'];
        $location = $_POST['location'];

        $select = "SELECT * FROM suppliers WHERE supplierphone = $phone OR supplieremail = '$email'";
        $result = mysqli_query($con, $select);
        $similar_phone_number = mysqli_num_rows($result);
        if ($similar_phone_number != 0) {
            $_SESSION['error'] = 'Farmer already exists';
            echo "<script>window.location.assign('../register.php')</script>";
        }
        else{
            $insert = "INSERT INTO suppliers(suppliername, supplierphone, supplieremail, idnumber, supplierlocation, suppliertype, password) VALUES('$name', '$phone', '$email', '$id', '$location', '7', '$password')";

            mysqli_query($con, $insert);
            $_SESSION['register'] = 'Successfully Registered. Now login...';
            echo "<script>window.location.assign('../index.php')</script>";
        }
    } else if ($_POST["user_type"] == "2") {
        $name = $_POST["name"];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $insert = "INSERT INTO admin_users(name, idnumber, email, password) VALUES('$name', '$id', '$email', '$password')";

        mysqli_query($con, $insert);
        $_SESSION['register'] = 'Successfully Registered. Now login...';
        echo "<script>window.location.assign('../index.php')</script>";
    }
}