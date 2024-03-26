<?php
include 'core/connection.php';

if (isset($_POST['n_password'])) {
    $Npassword = $_POST['n_password'];
    $fnumber = $_SESSION['supplier_number'];

    $update = "UPDATE suppliers SET password = '$Npassword' WHERE supplierphone = '$fnumber'";

    if (mysqli_query($con, $update) == TRUE) {
        echo '1';
    }
    else{
        echo '0';
    }
}