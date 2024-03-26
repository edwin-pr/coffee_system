<?php
include("connection.php");

if (isset ($_POST["new_request"])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $f_phone = $_SESSION['supplier_number'];

    $select = "SELECT * FROM suppliers WHERE supplierphone = '$f_phone'";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_array($result);
    $farmer_id = $row["id"];

    $insert = "INSERT INTO queries (farmer_id, subject, message) VALUES($farmer_id, '$subject', '$message')";
    mysqli_query($con, $insert);
    
    echo "<script>window.location.assign('../help.php')</script>";
}
